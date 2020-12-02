<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_to_stage".
 *
 * @property int|null $user_id
 * @property int|null $stage_id
 */
class StageToUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stage_to_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'stage_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('admin', 'User ID'),
            'stage_id' => Yii::t('admin', 'Stage ID'),
        ];
    }

    public function add($userId,$stageId){
        $model = new self();
        $model->user_id = $userId;
        $model->stage_id = $stageId;
        $model->save();
        return true;
    }

    public function getUserList(){
        return self::find()->where(['user_id'=>Yii::$app->user->id])->all();
    }

    public function getUser(){
        return $this->hasMany(User::className(),['id'=>'user_id']);
    }

    public function getStage(){
        return $this->hasOne(Stage::className(),['id'=>'stage_id']);
    }

}
