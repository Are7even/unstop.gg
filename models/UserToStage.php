<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_to_stage".
 *
 * @property int|null $user_id
 * @property int|null $stage_id
 */
class UserToStage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_to_stage';
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
}
