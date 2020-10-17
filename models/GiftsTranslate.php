<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gifts_translate".
 *
 * @property int $id
 * @property int|null $gifts_id
 * @property string|null $title
 * @property string|null $description
 */
class GiftsTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gifts_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gifts_id'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'gifts_id' => Yii::t('app', 'Gifts ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
