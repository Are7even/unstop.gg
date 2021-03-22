<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament_to_user".
 *
 * @property int|null $user_id
 * @property int|null $tournament_id
 */
class TournamentToUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_to_user';
    }

    public static function primaryKey()
    {
        return [
            'user_id',
            'tournament_id',
        ];
    }

    public function rules()
    {
        return [
            [['user_id', 'tournament_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('admin', 'User ID'),
            'tournament_id' => Yii::t('admin', 'Tournament ID'),
        ];
    }

    public function add($userId, $tournamentId)
    {
        $model = new self();
        $model->user_id = $userId;
        $model->tournament_id = $tournamentId;
        $model->save();
        return true;
    }

    public function deleteFromTournament($userId, $tournamentId)
    {
        $model = TournamentToUser::find()
            ->where(['user_id' => $userId, 'tournament_id' => $tournamentId])
            ->one();
        $model->delete();
        return true;
    }

    public function checkUser($userId, $tournamentId)
    {
        $model = new TournamentToUser();
        if ($model->find()
            ->where(['user_id' => $userId, 'tournament_id' => $tournamentId])) {
            return true;
        }
        return false;
    }

    static function getUserList($tournamentId)
    {
        return self::find()->select(['user_id'])->where(['tournament_id' => $tournamentId])->all();
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['id' => 'tournament_id']);
    }
}
