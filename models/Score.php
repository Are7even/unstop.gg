<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property int $id
 * @property int|null $fight_id
 * @property int|null $first_user_score
 * @property int|null $second_user_score
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'score';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_user_score', 'second_user_score'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'first_user_score' => Yii::t('admin', 'First User Score'),
            'second_user_score' => Yii::t('admin', 'Second User Score'),
        ];
    }

    public function create($first = 0, $second = 0)
    {
        $this->first_user_score = $first;
        $this->second_user_score = $second;
        $this->save();
        return $this->id;
    }

    public function getScore($id)
    {
        return $this->findOne($id);
    }
}
