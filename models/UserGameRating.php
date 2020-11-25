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

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function getGames(){
        return $this->hasOne(Games::className(),['id'=>'games_id']);
    }

}
