<?php


namespace app\widgets;


use app\helpers\TournamentStatusHelper;
use app\models\Tournament;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class TournamentWidget extends Widget
{

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $tournament = new ActiveDataProvider([
            'query' => Tournament::find()->where(['status'=>[TournamentStatusHelper::$waiting,TournamentStatusHelper::$fighting,TournamentStatusHelper::$created]]),
            'pagination' => false,
        ]);

        return $this->render('list-view-tournament',[
            'tournament'=>$tournament,
        ]);
    }

}