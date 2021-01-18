<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fight;

/**
 * FightSearch represents the model behind the search form of `app\models\Fight`.
 */
class FightSearch extends Fight
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tournament_id', 'score_id', 'status', 'fight_order', 'stage'], 'integer'],
            [['type', 'first_user_id', 'second_user_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Fight::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tournament_id' => $this->tournament_id,
            'score_id' => $this->score_id,
            'status' => $this->status,
            'fight_order' => $this->fight_order,
            'stage' => $this->stage,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'first_user_id', $this->first_user_id])
            ->andFilterWhere(['like', 'second_user_id', $this->second_user_id]);

        return $dataProvider;
    }
}
