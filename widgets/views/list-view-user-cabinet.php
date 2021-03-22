<?php

use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $user,
    'options' => [
        'tag' => 'div',
        'class' => 'lk-aside',
    ],
    'itemOptions'=>[
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-user-cabinet',
]);
?>
