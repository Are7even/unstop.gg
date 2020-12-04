<?php


namespace app\controllers;

use app\models\Games;
use app\models\Tournament;
use yii\web\Response;
use yii\web\Controller;
use Yii;



class TournamentController extends Controller
{

    public function actionIndex(){
        $games = Games::find()->all();
        
        return $this->render('index',[ 'games' => $games,]);
    }

    public function actionApi($id){
        $items=[];
        Yii::$app->response->format = Response::FORMAT_JSON;
        $items = ['some', 'array', 'of', 'data' => ['associative', 'array']];
        return $items;
    }

    public function actionView($id){
        $tournament = Tournament::findOne($id);
        return $this->render('view',[
            'tournament'=>$tournament,
        ]);
    }

   public function actionRegistration($userId){
        return 'action is work';
    }

}