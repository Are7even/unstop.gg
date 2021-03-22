<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title
 * @property string|null $description
 * @property string|null $href
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description','href'], 'string'],
            [['image', 'title'], 'string', 'max' => 255],
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
            'title' => Yii::t('admin', 'Title'),
            'description' => Yii::t('admin', 'Description'),
            'href' => Yii::t('admin', 'Href'),
        ];
    }

    public function getImage()
    {
        return ($this->image) ? '/upload/' . $this->image : '/no-image.png';
    }

}
