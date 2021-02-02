<?php

namespace app\models;

use app\components\EloTable;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_game_rating".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $games_id
 * @property int|null $rating
 */
class UserGameRating extends \yii\db\ActiveRecord
{

    static public $N = 1;

    public static function tableName()
    {
        return 'user_game_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'games_id', 'rating'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'user_id' => Yii::t('admin', 'User ID'),
            'games_id' => Yii::t('admin', 'Games ID'),
            'rating' => Yii::t('admin', 'Rating'),
        ];
    }

    static function addRating($userId, $gamesId)
    {
        $rating = new UserGameRating();
        $rating->user_id = $userId;
        $rating->games_id = $gamesId;
        $rating->rating = 100;
        $rating->save(false);
    }

    static function updateRating($userId, $gamesId, $Nozh, $winner = true)
    {
        $user = self::find()
            ->where(['user_id' => $userId, 'games_id' => $gamesId])
            ->one();

        $Rst = $user->rating;
        if ($winner) {
            $user->rating = intval($Rst + self::K($Rst) * (self::$N - $Nozh));
            return $user->save();
        }

        $user->rating = intval($Rst - (self::K($Rst) * (self::$N - $Nozh)));
        return $user->save();
    }

    static function Nozh($first_user_id, $second_user_id, $gamesId)
    {
        $more = true;
        $firstUserRating = self::find()
            ->where(['user_id' => $first_user_id, 'games_id' => $gamesId])
            ->one();

        $secondUserRating = self::find()
            ->where(['user_id' => $second_user_id, 'games_id' => $gamesId])
            ->one();

        $firstUserRating = $firstUserRating['rating'];
        $secondUserRating = $secondUserRating['rating'];

        $dR = abs($firstUserRating - $secondUserRating);

        if ($firstUserRating > $secondUserRating) {
            $more = true;
        } elseif ($firstUserRating < $secondUserRating) {
            $more = false;
        }


        for ($i = 0; $i < 50; $i++) {
            if (EloTable::$dR[$i][0] <= $dR && $dR <= EloTable::$dR[$i][1]) {
                if ($more) {
                    return EloTable::$RstH[$i];
                }
                return EloTable::$RstL[$i];
            }
        }
    }

    static function K($rating): int
    {
        if ($rating >= 2400) {
            return 10;
        } elseif ($rating >= 1200) {
            return 15;
        }
        return 25;
    }


    static function getUserRatingByGame($gameId, $userId)
    {
        $rating = self::find()->select(['rating'])->where(['games_id' => $gameId])->andWhere(['user_id' => $userId])->one();
        return $rating->rating;
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getGames()
    {
        return $this->hasOne(Games::className(), ['id' => 'games_id']);
    }

}
