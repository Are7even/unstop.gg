<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gifts".
 *
 * @property int $id
 * @property string|null $icon
 */
class Gifts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gifts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'icon' => Yii::t('admin', 'Icon'),
        ];
    }
}
