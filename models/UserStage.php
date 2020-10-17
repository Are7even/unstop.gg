<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_stage".
 *
 * @property int|null $user_id
 * @property int|null $stage_id
 */
class UserStage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_stage';
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
            'user_id' => Yii::t('app', 'User ID'),
            'stage_id' => Yii::t('app', 'Stage ID'),
        ];
    }
}
