<?php


namespace app\controllers;


use app\models\CabinetSetPhotoForm;
use app\models\CabinetUpdateForm;
use app\models\User;
use app\models\UserLinks;
use app\models\UserToGifts;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class CabinetController extends Controller
{

    public function actionIndex($id){
        if (!UserLinks::find()->where(['user_id'=>$id])->one()){
            UserLinks::add($id);
        }
        $gifts = UserToGifts::find()->where(['user_id'=>Yii::$app->user->id])->all();
        $user = User::findOne($id);
        $updateForm = new CabinetUpdateForm();
        $setPhotoForm = new CabinetSetPhotoForm();
        if ($updateForm->load(Yii::$app->request->post(),'')){
            if ($updateForm->validate()){
                $updateForm->edit();
                return $this->redirect(Url::toRoute(['/cabinet','id'=>Yii::$app->user->id]));
            }
        }
        return $this->render('index',[
            'user'=>$user,
            'updateForm'=>$updateForm,
            'gifts'=>$gifts,
            'photoForm'=>$setPhotoForm,
            ]);
    }

    public function actionHistory($id){
        return $this->render('lk-history');
    }

    public function actionMatches($id){
        return $this->render('lk-matches');
    }

    public function actionRating($id){
        return $this->render('lk-rating');
    }

    public function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPhoto($id){
        $model = new CabinetSetPhotoForm();

        if (Yii::$app->request->isPost) {
            $user = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'photo');
            if ($user->savePhoto($model->uploadFile($file, $user->image)))
            {
                return $this->redirect(Url::toRoute(['/cabinet','id'=>$user->id]));
            }
        } else {
            if (Yii::$app->request->isAjax){
                return $this->render('photo', ['model' => $model]);
            } else {
                return $this->render('photo', ['model' => $model]);
            }
        }
    }

}