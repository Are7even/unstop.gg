<?php

namespace app\models;

use Yii;

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
    /**
     * {@inheritdoc}
     */
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

    static function addRating($userId,$gamesId){
        $rating = new UserGameRating();
        $rating->user_id = $userId;
        $rating->games_id = $gamesId;
        $rating->rating = 0;
        $rating->save(false);
    }

    static function updateRating($userId,$gamesId){
        $model = self::find()
            ->where(['user_id'=>$userId,'games_id'=>$gamesId])
            ->one();

    }

    static function getUserRatingByGame($gameId,$userId){
        $rating = self::find()->select(['rating'])->where(['games_id'=>$gameId])->andWhere(['user_id'=>$userId])->one();
        return $rating->rating;
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function getGames(){
        return $this->hasOne(Games::className(),['id'=>'games_id']);
    }

}
