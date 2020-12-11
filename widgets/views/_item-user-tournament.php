<?php

use app\models\User;

?>
<div class="match-tournament">
    <img src="/web/upload/user/<?= $model->user->photo?>" alt="avatar">
    <div class="table">
        <div class="table-title">
            <?= Yii::t('admin','Username')?>
        </div>
        <div class="table-text">
            <?= $model->user->username?>
        </div>
    </div>
    <div class="table">
        <div class="table-title">
            <?= Yii::t('admin','Rating')?>
        </div>
        <div class="table-text">
            <?php echo User::getRating($model->tournament->game,$model->user->id)?>
        </div>
    </div>
    <div class="table">
        <div class="table-title">
            <?= Yii::t('admin','Status')?>
        </div>
        <div class="table-text">
            <?= (isset($model->user->authAssignment->item_name))?'admin':'user'?>
        </div>
    </div>

        <?= \yii\helpers\Html::a(Yii::t('admin','Profile'),\yii\helpers\Url::to(['cabinet/index','id'=>$model->user->id]),['class'=>'table-button'])?>

</div>
