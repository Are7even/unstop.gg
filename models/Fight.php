<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fight".
 *
 * @property int $id
 * @property int|null $stage_id
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
            [['stage_id', 'first_user_id_score', 'second_user_id_score'], 'integer'],
            [['first_user_id', 'second_user_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'stage_id' => Yii::t('admin', 'Stage ID'),
            'first_user_id' => Yii::t('admin', 'First User ID'),
            'second_user_id' => Yii::t('admin', 'Second User ID'),
            'first_user_id_score' => Yii::t('admin', 'First User Id Score'),
            'second_user_id_score' => Yii::t('admin', 'Second User Id Score'),
        ];
    }

    public function getStage () {
        return $this -> hasOne(Stage::className(), ['id'=>'stage_id']);
    }

}
