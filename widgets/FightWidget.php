<?php


namespace app\widgets;


use app\models\Fight;
use Yii;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class FightWidget extends Widget
{

    public $tournamentId;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        if (empty($this->tournamentId)) {
            $fight = new ActiveDataProvider([
                'query' => Fight::find()
                    ->where(['status' => 2, 'first_user_id' => Yii::$app->user->id])
                    ->orWhere(['status' => 2, 'second_user_id' => Yii::$app->user->id]),
                'pagination' => false,
            ]);
            return $this->render('list-view-fight', [
                'fight' => $fight,
            ]);
        } else
            $fight = new ActiveDataProvider([
                'query' => Fight::find()
                    ->where(['tournament_id' => $this->tournamentId, 'status' => 2, 'first_user_id' => Yii::$app->user->id])
                    ->orWhere(['tournament_id' => $this->tournamentId, 'status' => 2, 'second_user_id' => Yii::$app->user->id]),
                'pagination' => false,
            ]);
        return $this->render('list-view-fight', [
            'fight' => $fight,
        ]);
    }

}