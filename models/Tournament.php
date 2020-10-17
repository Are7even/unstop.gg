<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament".
 *
 * @property int $id
 * @property string|null $icon
 * @property string|null $game
 * @property int|null $created_at
 * @property int|null $hidden
 * @property int|null $handheld
 * @property string|null $type
 * @property int|null $rating_on
 * @property int|null $players_count
 * @property int|null $start
 * @property int|null $end
 * @property int|null $checkin
 * @property int|null $checkin_start
 * @property int|null $checkin_end
 * @property int|null $1_place
 * @property int|null $2_place
 * @property int|null $3_place
 * @property int|null $4_place
 * @property int|null $5_place
 */
class Tournament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'hidden', 'handheld', 'rating_on', 'players_count', 'start', 'end', 'checkin', 'checkin_start', 'checkin_end', '1_place', '2_place', '3_place', '4_place', '5_place'], 'integer'],
            [['icon', 'game', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'icon' => Yii::t('app', 'Icon'),
            'game' => Yii::t('app', 'Game'),
            'created_at' => Yii::t('app', 'Created At'),
            'hidden' => Yii::t('app', 'Hidden'),
            'handheld' => Yii::t('app', 'Handheld'),
            'type' => Yii::t('app', 'Type'),
            'rating_on' => Yii::t('app', 'Rating On'),
            'players_count' => Yii::t('app', 'Players Count'),
            'start' => Yii::t('app', 'Start'),
            'end' => Yii::t('app', 'End'),
            'checkin' => Yii::t('app', 'Checkin'),
            'checkin_start' => Yii::t('app', 'Checkin Start'),
            'checkin_end' => Yii::t('app', 'Checkin End'),
            '1_place' => Yii::t('app', '1 Place'),
            '2_place' => Yii::t('app', '2 Place'),
            '3_place' => Yii::t('app', '3 Place'),
            '4_place' => Yii::t('app', '4 Place'),
            '5_place' => Yii::t('app', '5 Place'),
        ];
    }
}
