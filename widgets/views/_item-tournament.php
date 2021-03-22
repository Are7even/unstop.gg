<?php

use yii\helpers\Html;

?>
<div class="game">
    <div class="game-container">
        <img src="/web/upload/<?= $model->icon?>" alt="<?= $model->icon?>">
        <div class="game-title">
            <?= $model->header?>
        </div>
    </div>
    <div class="game-buttons">
        <?=Html::a("<div class='game-button'>".Yii::t('admin','More').'</div>',['tournament/view','id'=>$model->id])?>
        <?=Html::a("<div class='game-button'>".Yii::t('admin','Registration').'</div>',['tournament/view','id'=>$model->id],['class'=>'active'])?>
    </div>
</div>
