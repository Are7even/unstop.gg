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
 * @property int|null $first_place
 * @property int|null $second_place
 * @property int|null $third_place
 * @property int|null $fourth_place
 * @property int|null $fifth_place
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
            [['created_at', 'hidden', 'handheld', 'rating_on', 'players_count', 'start', 'end', 'checkin', 'checkin_start', 'checkin_end', 'first_place', 'second_place', 'third_place', 'fourth_place', 'fifth_place'], 'integer'],
            [['icon', 'game', 'type'], 'string', 'max' => 255],
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
            'game' => Yii::t('admin', 'Game'),
            'created_at' => Yii::t('admin', 'Created At'),
            'hidden' => Yii::t('admin', 'Hidden'),
            'handheld' => Yii::t('admin', 'Handheld'),
            'type' => Yii::t('admin', 'Type'),
            'rating_on' => Yii::t('admin', 'Rating On'),
            'players_count' => Yii::t('admin', 'Players Count'),
            'start' => Yii::t('admin', 'Start'),
            'end' => Yii::t('admin', 'End'),
            'checkin' => Yii::t('admin', 'Checkin'),
            'checkin_start' => Yii::t('admin', 'Checkin Start'),
            'checkin_end' => Yii::t('admin', 'Checkin End'),
            'first_place' => Yii::t('admin', 'First Place'),
            'second_place' => Yii::t('admin', 'Second Place'),
            'third_place' => Yii::t('admin', 'Third Place'),
            'fourth_place' => Yii::t('admin', 'Fourth Place'),
            'fifth_place' => Yii::t('admin', 'Fifth Place'),
        ];
    }
}
