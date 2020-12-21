<?php

namespace app\models;

use app\models\Score;
use Yii;

/**
 * This is the model class for table "fight".
 *
 * @property int $id
 * @property int|null $tournament_id
 * @property string|null $first_user_id
 * @property string|null $second_user_id
 * @property int|null $first_user_id_score
 * @property int|null $second_user_id_score
 */
class Fight extends \yii\db\ActiveRecord
{
    public static $status = [
        'ongoing' => 0,
        'finished' => 1
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
            [['tournament_id', 'first_user_id_score', 'second_user_id_score','fight_order', 'score_id', 'status'], 'integer'],
            [['first_user_id', 'second_user_id', 'type'], 'string', 'max' => 255],
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
            'first_user_id_score' => Yii::t('admin', 'First User Id Score'),
            'second_user_id_score' => Yii::t('admin', 'Second User Id Score'),
        ];
    }

    static function add($firstUserId, $secondUserId, $tournamentId, $order, $scoreId, $type){
        $model = new self();
        $model->tournament_id = $tournamentId;
        $model->first_user_id = $firstUserId;
        $model->second_user_id = $secondUserId;
        $model->fight_order = $order;
        $model->score_id = $scoreId;
        $model->type = $type;
        return $model->save();
    }

    public function getTournamentFights($tournamentId)
    {
        return $this
            ->find()
            ->where(['tournament_id' => $tournamentId])
            ->orderBy('fight_order')
            ->all();
    }

    public function getStage () {
        return $this -> hasOne(Stage::className(), ['id'=>'stage_id']);
    }

    public function getTournament () {
        return $this -> hasOne(Tournament::className(), ['id'=>'tournament_id']);
    }

    public function getFightById($fightId)
    {
        return $this->findOne($fightId);
    }

    public function updateFightStatus($fightId, $status = null) {
        $fight = $this->getFightById($fightId);

        if ($fight) {
            if ($status == self::$status['ongoing'] || $status == self::$status['finished']) {
                $fight->status = $status;
                return $fight->save();
            }

            $scoreModel = new Score();
            $score = $scoreModel->getScore($fight->score_id);
            $limit = self::$winLimit[$fight->type];
            if ($score->first_user_score >= $limit || $score->second_user_score >= $limit) {
                $fight->status = self::$status['finished'];
                return $fight->save();
            }
        }

        return false;
    }

    static function getFightingUser(){
        return User::findOne(Yii::$app->user->id);
    }

    static function getEnemy($enemyId){
        return User::findOne($enemyId);
    }

    public function getScore(){
        return $this->hasOne(Score::className(),['id'=>'score_id']);
    }

}
