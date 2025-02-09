<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Fights');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fight-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('admin', 'Create Fight'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'tournament_id',
                'label' => Yii::t('admin', 'Tournament'),
                'value' => function ($model) {
                    return $model->tournament->header;
                }

            ],
            'type',
            [
                'attribute' => 'first_user_id',
                'label' => Yii::t('admin', 'First player'),
                'value' => function ($model) {
                    return \app\models\User::getUsername($model->first_user_id);
                }

            ],
            [
                'attribute' => 'second_user_id',
                'label' => Yii::t('admin', 'Second player'),
                'value' => function ($model) {
                    return \app\models\User::getUsername($model->second_user_id) ?? '...on waiting...';
                }

            ],
            //'score_id',
            //'status',
            //'fight_order',
            //'stage',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {fixScore}',
                'buttons' => [
                    'fixScore' => function ($url, $model, $key) {
                        $iconName = "wrench";
                        $icon = Html::tag('i', '', ['class' => "mdi mdi-$iconName"]);
                        return Html::a($icon, Url::to(['score/update', 'id' => $model->score_id, 'tournamentId' => $model->tournament_id]), ['title' => Yii::t('admin', 'Change scores')]);
                    }
                ],

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
