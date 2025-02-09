<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('admin', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'auth_key',
            'first_name',
            'last_name',
            'username',
            'email:email',
            //'password',
            //'role',
            //'reputation',
            //'photo',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {ban}',
                'buttons' => [
                    'ban' => function ($url, $model, $key) {
                        if (!Yii::$app->authManager->getAssignment('ban',$model->id)) {
                            $iconName = "lock";
                            $icon = Html::tag('i', '', ['class' => "mdi mdi-$iconName"]);
                            return Html::a($icon, Url::to(['user/ban', 'id' => $model->id]));
                        }
                        $iconName = "lock-open-variant";
                        $icon = Html::tag('i', '', ['class' => "mdi mdi-$iconName"]);
                        return Html::a($icon, Url::to(['user/unban', 'id' => $model->id]));
                    }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
