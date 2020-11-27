<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_links".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $vk
 * @property string|null $fb
 * @property string|null $twitch
 * @property string|null $steam
 * @property string|null $battle_net
 * @property string|null $youtube
 * @property string|null $xbox
 * @property string|null $ps
 */
class UserLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['vk', 'fb', 'twitch', 'steam', 'battle_net', 'youtube', 'xbox', 'ps'], 'string', 'max' => 100],
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
            'vk' => Yii::t('admin', 'Vk'),
            'fb' => Yii::t('admin', 'Fb'),
            'twitch' => Yii::t('admin', 'Twitch'),
            'steam' => Yii::t('admin', 'Steam'),
            'battle_net' => Yii::t('admin', 'Battle Net'),
            'youtube' => Yii::t('admin', 'Youtube'),
            'xbox' => Yii::t('admin', 'Xbox'),
            'ps' => Yii::t('admin', 'Ps'),
        ];
    }

    public static function updateLinks($vk,$fb,$twitch,$steam,$battleNet,$youTube,$xbox,$ps){
        $userLinks = self::findById(Yii::$app->user->id);
        $userLinks->vk = $vk;
        $userLinks->fb = $fb;
        $userLinks->twitch = $twitch;
        $userLinks->steam = $steam;
        $userLinks->battle_net = $battleNet;
        $userLinks->youtube = $youTube;
        $userLinks->xbox = $xbox;
        $userLinks->ps = $ps;
        return $userLinks->save();
    }

    public static function findById($id)
    {
        return UserLinks::find()->where(['user_id' => $id])->one();
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

}
