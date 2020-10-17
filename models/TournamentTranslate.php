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
            [['header', 'short_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tournament_id' => Yii::t('app', 'Tournament ID'),
            'header' => Yii::t('app', 'Header'),
            'short_text' => Yii::t('app', 'Short Text'),
            'text' => Yii::t('app', 'Text'),
        ];
    }
}
