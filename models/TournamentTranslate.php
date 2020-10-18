<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament_translate".
 *
 * @property int $id
 * @property int|null $tournament_id
 * @property string|null $header
 * @property string|null $short_text
 * @property string|null $text
 * @property string|null $language
 */
class TournamentTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tournament_id'], 'integer'],
            [['text'], 'string'],
            [['header', 'short_text', 'language'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'tournament_id' => Yii::t('admin', 'Tournament ID'),
            'header' => Yii::t('admin', 'Header'),
            'short_text' => Yii::t('admin', 'Short Text'),
            'text' => Yii::t('admin', 'Text'),
            'language' => Yii::t('admin', 'Language'),
        ];
    }
}
