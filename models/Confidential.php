<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "confidential".
 *
 * @property int $id
 * @property string $text
 * @property int $status
 */
class Confidential extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'confidential';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'text' => Yii::t('admin', 'Text'),
            'status' => Yii::t('admin', 'Status'),
        ];
    }
}
