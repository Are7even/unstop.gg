<?php

use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $fight,
    'options' => [
       // 'class'=>'games'
    ],
    'itemOptions'=>[
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-fight',
]);
?>
