<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $code
 * @property string $locale
 * @property string $title
 * @property string $icon
 * @property int|null $status
 * @property int|null $pos
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'locale', 'title', 'icon'], 'required'],
            [['status', 'pos'], 'integer'],
            [['code', 'locale', 'title', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'code' => Yii::t('admin', 'Code'),
            'locale' => Yii::t('admin', 'Locale'),
            'title' => Yii::t('admin', 'Title'),
            'icon' => Yii::t('admin', 'Icon'),
            'status' => Yii::t('admin', 'Status'),
            'pos' => Yii::t('admin', 'Pos'),
        ];
    }
}
