<?php


namespace app\controllers;

use yii\web\Controller;
use Yii;



class TournamentController extends Controller
{

    public function actionIndex(){

        return $this->render('index');
    }

}