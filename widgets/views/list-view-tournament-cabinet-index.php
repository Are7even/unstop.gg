<?php

use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $tournament,
    'options' => [
        'class'=>'match-container'
    ],
    'itemOptions'=>[
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-tournament-cabinet-index',
]);
?>
