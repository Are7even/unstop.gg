<?php


namespace app\controllers;


use app\models\Games;
use app\models\UserGameRating;
use yii\web\Controller;

class TopController extends Controller
{

    public function actionIndex(){
        $games = Games::find()->all();

        return $this->render('index',compact('games'));
    }

}