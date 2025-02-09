<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stage;

/**
 * StageSearch represents the model behind the search form of `app\models\Stage`.
 */
class StageSearch extends Stage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tournament_id', 'start', 'end', 'players_count'], 'integer'],
            [['type', 'rule'], 'safe'],
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
        $query = Stage::find();

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
            'start' => $this->start,
            'end' => $this->end,
            'players_count' => $this->players_count,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'rule', $this->rule]);

        return $dataProvider;
    }
}
