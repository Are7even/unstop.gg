<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Tournament;
use app\models\TournamentSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TournamentController implements the CRUD actions for Tournament model.
 */
class TournamentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tournament models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TournamentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tournament model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tournament model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tournament();

        if ($model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('TournamentTranslate', []) as $language => $data) {
                foreach ($data as $attribute => $translation) {
                    $model->translate($language)->$attribute = $translation;
                }
            }
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tournament model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (!Yii::$app->user->can('updateOwnTournament',['post'=>$model])){
            throw new ForbiddenHttpException(Yii::t('admin','You are not the author!'));
        }

        if ($model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('TournamentTranslate', []) as $language => $data) {
                foreach ($data as $attribute => $translation) {
                    $model->translate($language)->$attribute = $translation;
                }
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionAllow($id){
        $tournament = Tournament::findOne($id);
        if ($tournament->allow()){
            return $this->redirect(['view', 'id' => $tournament->id]);
        }
    }

    public function actionDisallow($id){
        $tournament = Tournament::findOne($id);
        if ($tournament->disallow()){
            return $this->redirect(['view', 'id' => $tournament->id]);
        }
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (!Yii::$app->user->can('updateOwnTournament',['post'=>$model])){
            throw new ForbiddenHttpException(Yii::t('admin','You are not the author!'));
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Tournament::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('admin', 'The requested page does not exist.'));
    }
}
