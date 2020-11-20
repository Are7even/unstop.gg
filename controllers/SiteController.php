<?php

namespace app\controllers;

use app\models\FurtherInformationForm;
use app\models\RegistrationForm;
use app\models\User;
use Yii;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $loginForm = new LoginForm();
        $registrationForm = new RegistrationForm();
        $furtherInformationForm = new FurtherInformationForm();

        if (Yii::$app->request->isPost) {

            $data = Yii::$app->request->post();
            if (isset($data['formId'])) {
                if ($data['formId'] === 'registration-form') {
                    if ($registrationForm->load($data, '')) {
                        if ($registrationForm->validate()) {
                            $registrationForm->save();
                            Yii::$app->session->setFlash('registration', Yii::t('admin', 'User registered!'));
                            return $this->redirect('/');
                        }
                    }
                } elseif ($data['formId'] === 'login-form') {
                    if ($loginForm->load($data, '')) {
                        if ($loginForm->validate() && $loginForm->login()) {
                            $loginForm->password = '';
                            return $this->redirect('/');
                        }
                    }

                } elseif ($data['formId'] === 'registration-form') {

                }
            }
        }

        return $this->render('index', [
            'login' => $loginForm,
            'registration' => $registrationForm,
            'furtherInformation' => $furtherInformationForm,
            'user'=>$user,
        ]);
    }

    public function actionRegistration()
    {
        $model = new RegistrationForm();
        if (!$model->validate()) {
            return $this->actionIndex();
        }
        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            Yii::$app->session->setFlash('registration', Yii::t('admin', 'User registered!'));
            return $this->goHome();
        }
    }

//    public function actionRegistration()
//    {
//        $model = new RegistrationForm();
//        $isSuccessfullySaved = (
//            Yii::$app->request->isPost &&
//            $model->load(Yii::$app->request->post(), '') &&
//            $model->save()
//        );
//
//        if ($isSuccessfullySaved) {
//            Yii::$app->session->setFlash('registration', Yii::t('admin', 'User registered!'));
//            return $this->goHome();
//        }
//    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
