<?php

namespace app\models;

<<<<<<< HEAD
use creocoder\translateable\TranslateableBehavior;
=======
>>>>>>> origin/Oleg
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

<<<<<<< HEAD
    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['header','description','keywords'],
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

=======
>>>>>>> origin/Oleg
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'name', 'genre_id'], 'string', 'max' => 255],
<<<<<<< HEAD
            [['image'], 'default', 'value' => 'no-image.png'],
=======
>>>>>>> origin/Oleg
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
<<<<<<< HEAD

    public function getTranslations () {
        return $this -> hasMany(GamesTranslate::className(), ['games_id'=>'id']);
    }

    public function getGenre(){
        return $this->hasOne(Genre::className(),['id'=>'genre_id']);
    }

=======
>>>>>>> origin/Oleg
}
