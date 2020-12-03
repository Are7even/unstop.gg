<?php


namespace app\controllers;

use app\models\Games;
use yii\web\Controller;
use Yii;



class TournamentController extends Controller
{

    public function actionIndex(){
        $games = Games::find()->all();
        
        return $this->render('index',[ 'games' => $games,]);
    }

    public function actionApi($id){

        return $this->render('api');
    }

    public function actionView($id){

        return $this->render('view');
    }

}