<?php

namespace app\models;

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
            [['tournament_id', 'first_user_id_score', 'second_user_id_score'], 'integer'],
            [['first_user_id', 'second_user_id'], 'string', 'max' => 255],
        ];
    }



    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'tournament_id' => Yii::t('admin', 'Tournament ID'),
            'first_user_id' => Yii::t('admin', 'First User ID'),
            'second_user_id' => Yii::t('admin', 'Second User ID'),
            'first_user_id_score' => Yii::t('admin', 'First User Id Score'),
            'second_user_id_score' => Yii::t('admin', 'Second User Id Score'),
        ];
    }

    static function add($firstUserId,$secondUserId,$tournamentId){
        $model = new self();
        $model->tournament_id = $tournamentId;
        $model->first_user_id = $firstUserId;
        $model->second_user_id = $secondUserId;
        $model->save(false);
        return true;
    }

    public function getStage () {
        return $this -> hasOne(Stage::className(), ['id'=>'stage_id']);
    }

}
