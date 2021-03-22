<?php

namespace app\models;

use app\models\Tournament;
use app\models\Score;
use Yii;
use yii\web\BadRequestHttpException;

/**
 * This is the model class for table "fight".
 *
 * @property int $id
 * @property int|null $tournament_id
 * @property string|null $first_user_id
 * @property string|null $second_user_id
 * @property string|null $score_id
 */
class Fight extends \yii\db\ActiveRecord
{
    public static $status = [
        'waiting' => 0,
        'ongoing' => 1,
        'finished' => 2
    ];

    public static $winLimit = [
        'bo1' => 1,
        'bo3' => 2,
        'bo5' => 3,
        'bo7' => 4
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_user_id', 'second_user_id', 'tournament_id', 'fight_order', 'score_id', 'status'], 'integer'],
            [['type'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'type' => Yii::t('admin', 'Type'),
            'score_id' => Yii::t('admin', 'Score ID'),
            'status' => Yii::t('admin', 'Status'),
            'tournament_id' => Yii::t('admin', 'Tournament ID'),
            'fight_order' => Yii::t('admin', 'Fight Order'),
            'first_user_id' => Yii::t('admin', 'First User ID'),
            'second_user_id' => Yii::t('admin', 'Second User ID'),
        ];
    }

    private function createStageFight($fight, $score)
    {
        $tournamentModel = new Tournament();
        $tournament = $tournamentModel->getTournament($fight->tournament_id);
        $size = $tournament->players_count / $fight->stage / 2;
        $fightOrder = ceil($fight->fight_order / 2) + $size;
        $current = $this
            ->find()
            ->where([
                'tournament_id' => $tournament->id,
                'fight_order' => $fightOrder
            ])
            ->one();

        $winner = $score->first_user_score > $score->second_user_score
            ? $fight->first_user_id
            : $fight->second_user_id;


        if (!$current) {
            $score = new Score();
            $scoreId = $score->create();
            return self::add($winner, null, $tournament->id, $fightOrder, $scoreId, $fight->type, $fight->stage + 1);
        } else {
            if (!$current->first_user_id) {
                $current->first_user_id = $winner;
            } else {
                $current->second_user_id = $winner;
            }
            return $current->save();
        }
    }

    static function add($firstUserId, $secondUserId, $tournamentId, $order, $scoreId, $type, $stage = 1)
    {
        $model = new self();
        $model->tournament_id = $tournamentId;
        $model->first_user_id = $firstUserId;
        $model->second_user_id = $secondUserId;
        $model->fight_order = $order;
        $model->score_id = $scoreId;
        $model->type = $type;
        $model->stage = $stage;
        return $model->save();
    }

    public function createFight($firstUserId, $secondUserId, $tournamentId, $order, $scoreId, $type)
    {
        $this->tournament_id = $tournamentId;
        $this->first_user_id = $firstUserId;
        $this->second_user_id = $secondUserId;
        $this->fight_order = $order;
        $this->score_id = $scoreId;
        $this->type = $type;
        return $this->save();
    }

    public function getTournamentFights($tournamentId)
    {
        return $this
            ->find()
            ->where(['tournament_id' => $tournamentId])
            ->orderBy('fight_order')
            ->all();
    }

    public function getStage()
    {
        return $this->hasOne(Stage::className(), ['id' => 'stage_id']);
    }

    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['id' => 'tournament_id']);
    }

    public function getFightById($fightId)
    {
        return $this->findOne($fightId);
    }

    public function updateFightStatus($fightId, $status = -1)
    {
        $fight = $this->getFightById($fightId);
        $gamesId = $fight->tournament->game;
        $ratingModel = new UserGameRating();

        if ($fight) {
            if (
                $status === self::$status['ongoing'] ||
                $status === self::$status['finished'] ||
                $status === self::$status['waiting']
            ) {
                $fight->status = $status;
                return $fight->save();
            }

            $scoreModel = new Score();
            $score = $scoreModel->getScore($fight->score_id);
            $limit = self::$winLimit[$fight->type];
            if ($score->first_user_score >= $limit || $score->second_user_score >= $limit) {
                $fight->status = self::$status['finished'];
                $isSaved = $fight->save();

                if (Tournament::getRatingStatus($fight->tournament_id) == 1) {
                    $ratingModel::updateRating(
                        self::player($fight->id, true),
                        $gamesId,
                        $ratingModel::Nozh(self::player($fight->id, true), self::player($fight->id, false), $gamesId),
                        true
                    );

                    $ratingModel::updateRating(
                        self::player($fight->id, false),
                        $gamesId,
                        $ratingModel::Nozh(self::player($fight->id, false), self::player($fight->id, true), $gamesId),
                        false
                    );
                }

                if ($isSaved) {
                    return $this->createStageFight($fight, $score);
                }
            }
        }

        return false;
    }

    static function player($fightId, $winner = true)
    {
        $fight = self::findOne($fightId);
        $score_id = $fight->score_id;
        $score = Score::findOne($score_id);
        $first_user_score = $score->first_user_score;
        $second_user_score = $score->second_user_score;
        if ($first_user_score > $second_user_score) {
            if ($winner) {
                return $fight->first_user_id;
            }
            return $fight->second_user_id;
        } elseif ($first_user_score < $second_user_score) {
            if ($winner) {
                return $fight->second_user_id;
            }
            return $fight->first_user_id;
        }
    }

    static function maxGamesByBO($type)
    {
        if ($type == 'bo1') {
            return 1;
        } elseif ($type == 'bo3') {
            return 2;
        } elseif ($type == 'bo5') {
            return 3;
        } elseif ($type == 'bo7') {
            return 4;
        }
        throw new BadRequestHttpException('Not correct Fight type');
    }

    static function getFightingUser()
    {
        return User::findOne(Yii::$app->user->id);
    }

    static function getEnemy($enemyId)
    {
        return User::findOne($enemyId);
    }

    public function getScore()
    {
        return $this->hasOne(Score::className(), ['id' => 'score_id']);
    }

}
