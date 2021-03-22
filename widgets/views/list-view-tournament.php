<?php

use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $tournament,
    'options' => [
        'class'=>'games'
    ],
    'itemOptions'=>[
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-tournament',
]);
?>
