<?php


use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $list,
    'options' => [
       // 'class' => 'rating-list',
    ],
    'itemOptions' => [
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-top-players',
]);
