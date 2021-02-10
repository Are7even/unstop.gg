<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convention".
 *
 * @property int $id
 * @property string $text
 * @property int $status
 */
class Convention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convention';
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
