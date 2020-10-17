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
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'locale' => Yii::t('app', 'Locale'),
            'title' => Yii::t('app', 'Title'),
            'icon' => Yii::t('app', 'Icon'),
            'status' => Yii::t('app', 'Status'),
            'pos' => Yii::t('app', 'Pos'),
        ];
    }
}
