<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div>
    <?php echo Html::a(Html::img($model->getImage()),Url::to($model->href))?>
    <div class="title"><?php echo $model->title?></div>
    <div class="description"><?php echo $model->description;?></div>
</div>