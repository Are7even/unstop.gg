<?php

use app\models\User;
use yii\helpers\Url;

?>
<div class="match-tournament">
    <img src="/web/upload/user/<?= $model->user->photo ?>" alt="avatar">
    <div class="table">
        <div class="table-title">
            <?= Yii::t('admin', 'Username') ?>
        </div>
        <div class="table-text">
            <?= $model->user->username ?>
        </div>
    </div>
    <div class="table">
        <div class="table-title">
            <?= Yii::t('admin', 'Rating') ?>
        </div>
        <div class="table-text">
            <?php echo User::getRating($model->tournament->game, $model->user->id) ?>
        </div>
    </div>
    <div class="table">
        <div class="table-title">
            <?= Yii::t('admin', 'Status') ?>
        </div>
        <div class="table-text">
            <?= (isset($model->user->authAssignment->item_name)) ? 'admin' : 'user' ?>
        </div>
    </div>

<div class="table-button">
    <a class="close"
       href="<?= Url::to(['tournament/delete-player', 'userId' => $model->user->id, 'tournamentId'=>$model->tournament->id]) ?>">
        <i class="fa fa-times"></i>
    </a>
    <?= \yii\helpers\Html::a(Yii::t('admin', 'Profile'), \yii\helpers\Url::to(['cabinet/index', 'id' => $model->user->id]),['style'=>'color:white;']) ?>
</div>
</div>
