<?php
/**
 * Created by PhpStorm.
 * User: медведь
 * Date: 02.12.2017
 * Time: 22:07
 */

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

?>

<?= ListView::widget([
    'itemView' => '_row-users',
    'layout' => '{items}',
    'dataProvider' => new ActiveDataProvider([
        'query' => $usersList,
        'pagination' => false
    ])
])?>
