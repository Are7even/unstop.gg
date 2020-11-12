<?php


namespace app\widgets;

use app\models\Advertisement;
use yii\data\ActiveDataProvider;
use yii\base\Widget;

class AdvertisementWidget extends Widget
{
    public function run(){

        $advertisement = new ActiveDataProvider([
            'query' => Advertisement::find()->orderBy('id DESC')->limit(3),
            'pagination' => false,
        ]);
        if (empty($advertisement)){
            return false;
        }
        return $this->render('list-view-advertisement',['advertisement'=>$advertisement]);
    }
}