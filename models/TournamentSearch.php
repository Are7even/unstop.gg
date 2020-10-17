<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tournament;

/**
 * TournamentSearch represents the model behind the search form of `app\models\Tournament`.
 */
class TournamentSearch extends Tournament
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'hidden', 'handheld', 'rating_on', 'players_count', 'start', 'end', 'checkin', 'checkin_start', 'checkin_end', '1_place', '2_place', '3_place', '4_place', '5_place'], 'integer'],
            [['icon', 'game', 'type'], 'safe'],
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
        $query = Tournament::find();

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
            'created_at' => $this->created_at,
            'hidden' => $this->hidden,
            'handheld' => $this->handheld,
            'rating_on' => $this->rating_on,
            'players_count' => $this->players_count,
            'start' => $this->start,
            'end' => $this->end,
            'checkin' => $this->checkin,
            'checkin_start' => $this->checkin_start,
            'checkin_end' => $this->checkin_end,
            '1_place' => $this->1_place,
            '2_place' => $this->2_place,
            '3_place' => $this->3_place,
            '4_place' => $this->4_place,
            '5_place' => $this->5_place,
        ]);

        $query->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'game', $this->game])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
