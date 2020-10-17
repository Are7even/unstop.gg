<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $name
 * @property string|null $genre_id
 */
class Games extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'name', 'genre_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'image' => Yii::t('admin', 'Image'),
            'name' => Yii::t('admin', 'Name'),
            'genre_id' => Yii::t('admin', 'Genre ID'),
        ];
    }
}
