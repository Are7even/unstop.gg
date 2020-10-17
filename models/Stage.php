<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stage".
 *
 * @property int $id
 * @property int|null $tournament_id
 * @property string|null $type
 * @property string|null $rule
 * @property int|null $start
 * @property int|null $end
 * @property int|null $players_count
 */
class Stage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tournament_id', 'start', 'end', 'players_count'], 'integer'],
            [['type', 'rule'], 'string', 'max' => 255],
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
            'type' => Yii::t('admin', 'Type'),
            'rule' => Yii::t('admin', 'Rule'),
            'start' => Yii::t('admin', 'Start'),
            'end' => Yii::t('admin', 'End'),
            'players_count' => Yii::t('admin', 'Players Count'),
        ];
    }
}
