<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "intermediate_score".
 *
 * @property int $id
 * @property int|null $fight_id
 * @property int|null $first_user_id_status
 * @property int|null $second_user_id_status
 */
class IntermediateScore extends \yii\db\ActiveRecord
{
    public static $status = [
        'unset' => 0,
        'win' => 1,
        'lose' => 2
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'intermediate_score';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fight_id', 'first_user_id_status', 'second_user_id_status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'fight_id' => Yii::t('admin', 'Fight ID'),
            'first_user_id_status' => Yii::t('admin', 'First User Id Status'),
            'second_user_id_status' => Yii::t('admin', 'Second User Id Status'),
        ];
    }

    private function create($fightId, $firstStatus, $secondStatus)
    {
        $this->first_user_id_status = $firstStatus;
        $this->second_user_id_status = $secondStatus;
        $this->fight_id = $fightId;
        return $this->save();
    }

    public function updateStatuses($fightId, $firstStatus = 0, $secondStatus = 0)
    {
        $status = $this->getByFight($fightId);
        if ($status && $status->active) {
            if ($firstStatus == self::$status['win'] || $firstStatus == self::$status['lose']) {
                $status->first_user_id_status = $firstStatus;
            }
            if ($secondStatus == self::$status['win'] || $secondStatus == self::$status['lose']) {
                $status->second_user_id_status = $secondStatus;
            }

            if (
                $status->first_user_id_status != self::$status['unset'] &&
                $status->second_user_id_status != self::$status['unset'] &&
                $status->first_user_id_status != $status->second_user_id_status
            ) {
                $status->active = false;
            }

            return $status->save();
        } else {
            return $this->create($fightId, $firstStatus, $secondStatus);
        }
    }

    public function getByFight($fightId)
    {
        return $this
            ->find()
            ->where(['fight_id' => $fightId])
            ->one();
    }
}
