<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\RegistrationForm;
use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionRegistration()
    {

        $model = new RegistrationForm();

        if ($model->load(Yii::$app->request->post())&&$model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('admin', 'User registered!'));
            return $this->redirect(Url::to(['auth/login']));
        }
        return $this->render('registration', [
            'model' => $model,
        ]);

    }

}