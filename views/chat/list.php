<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список бесед';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'visible' => false],



           /* [
                'attribute' => 'image',
                'value' => function ($data)
                {
                    $img = $data->getImage();
                    return '<img class="imagefeatured" src="'. Url::to([$img->getUrl()]) .'">';
                },
                'format' => 'html'
            ],*/
            'username',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действие',
                'template' => '{chat}',
                'buttons'=> [
                    'chat' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="fa fa-comment-o"></span>',
                            ['/chat/chat', 'id' => $model->id],
                            [
                                'class' => 'label btn-success',
                                'title' => 'Посматреть',
                                'aria-label' => 'Посматреть',
                            ]);
                    },

                ],
            ],
        ],
    ]); ?>
</div>
