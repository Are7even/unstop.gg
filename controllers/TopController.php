<?php


namespace app\controllers;


use yii\web\Controller;

class TopController extends Controller
{

    public function actionIndex(){
        return $this->render('index');
    }

}