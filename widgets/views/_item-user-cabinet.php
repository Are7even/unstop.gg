<?php

use yii\helpers\Html;

?>

<div class="lk-info">
        <div class="image-container">
            <img class="lk-image" src="/web/upload/user/<?= $model->photo ?>" alt="">
            <?= (Yii::$app->user->can('premium_user')) ? '<img class="diamond" src="/web/site/img/diamond.png" alt="">' : ''?>
        </div>
        <p class="name"><?= Yii::t('admin','Username')?>: <?= $model->username?></p>
        <p class="status"><?= Yii::t('admin','Status')?>: <?= (Yii::$app->user->can('admin')?'admin':'user')?></p>
        <p><?= Yii::t('admin','Reputation')?>: <?= $model->reputation?></p>
        <p class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </p>
    </div>

    <div class="lk-social">
        <a href=""><img src="/web/site/img/lk_items/vk.png" alt=""></a>
        <a href=""><img src="/web/site/img/lk_items/fb.png" alt=""></a>
        <a href=""><img src="/web/site/img/lk_items/twich.png" alt=""></a>
        <a href=""><img src="/web/site/img/lk_items/steam.png" alt=""></a>
        <a href=""><img src="/web/site/img/lk_items/battl.png" alt=""></a>
        <a href=""><img src="/web/site/img/lk_items/youtube.png" alt=""></a>
        <a href=""><img src="/web/site/img/lk_items/xbox.png" alt=""></a>
        <a href=""><img src="/web/site/img/lk_items/ps.png" alt=""></a>
    </div>

    <div>
        <?= Html::a(Yii::t('admin','Set photo'), \yii\helpers\Url::to(['cabinet/photo','id'=>$model->id]), ['class' => 'btn btn-default']) ?>
    </div>

