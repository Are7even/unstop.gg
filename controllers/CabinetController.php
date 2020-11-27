<?php


namespace app\controllers;


use app\models\CabinetUpdateForm;
use app\models\User;
use app\models\UserToGifts;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;


class CabinetController extends Controller
{

    public function actionIndex($id){
        $gifts = UserToGifts::find()->where(['user_id'=>Yii::$app->user->id])->all();
        $user = User::findOne($id);
        $updateForm = new CabinetUpdateForm();
        if ($updateForm->load(Yii::$app->request->post(),'')){
            if ($updateForm->validate()){
                $updateForm->edit();
                return $this->redirect(Url::toRoute(['/cabinet','id'=>Yii::$app->user->id]));
            }
        }
        return $this->render('index',['user'=>$user,'updateForm'=>$updateForm,'gifts'=>$gifts]);
    }

}