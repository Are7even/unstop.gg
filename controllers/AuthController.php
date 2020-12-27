<?php


namespace app\controllers;


use app\models\FurtherInformationForm;
use app\models\LoginForm;
use app\models\RegistrationForm;
use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use app\components\AuthHandler;

class AuthController extends Controller
{

    public function actions()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }

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
            'login' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }


//    public function actionRegistration()
//    {
//        $model = new RegistrationForm();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            Yii::$app->session->setFlash('success', Yii::t('admin', 'User registered!'));
//            return $this->redirect(Url::to(['auth/login']));
//        }
//        return $this->render('registration', [
//            'registration' => $model,
//        ]);
//
//    }

    public function actionLoginVk($uid, $first_name, $last_name, $photo)
    {
        if (User::findById($uid)){
            Yii::$app->getUser()->login($uid);
            return $this->redirect(Url::to(['site/index']));
        }
        $user = new User();
        if ($user->saveFromVk($uid, $first_name, $last_name, $photo)) {
            if (empty(User::getUsername(Yii::$app->user->id))) {
                return $this->redirect(['auth/further-information']);
            }
        }
        return $this->redirect(Url::to(['auth/login']));
    }

    public function actionFurtherInformation()
    {
        $model = new FurtherInformationForm();
        $user = new User();
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if ($model->load(Yii::$app->request->post())) {
            $user->updateFurtherInformation(Yii::$app->user->id, $model->username, $model->email);
            Yii::$app->session->setFlash('success', Yii::t('admin', 'User registered!'));
            return $this->redirect(Url::to(['site/index']));
        }
        return $this->render('further-information', [
            'furtherInformation' => $model,
        ]);
    }

}