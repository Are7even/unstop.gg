<?php

use yii\helpers\Html;

?>

<div class="lk-info">
    <div class="image-container">
        <img class="lk-image" src="/web/upload/user/<?= $model->photo ?>" alt="">
        <?= (Yii::$app->user->can('premium_user')) ? '<img class="diamond" src="/web/site/img/diamond.png" alt="">' : '' ?>
    </div>
    <p class="name"><?= Yii::t('admin', 'Username') ?>: <?= $model->username ?></p>
    <p class="status"><?= Yii::t('admin', 'Status') ?>
        : <?= ($model->authAssignment->item_name) ? 'admin' : 'user' ?></p>
    <p><?= Yii::t('admin', 'Reputation') ?>: <?= $model->reputation ?></p>
    <p class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    </p>
</div>

<div class="lk-social">
    <a href="<?= (isset($model->userLinks->vk))?$model->userLinks->vk:'#'?>" target="_blank"><img src="/web/site/img/lk_items/vk.png" alt=""></a>
    <a href="<?= (isset($model->userLinks->fb))?$model->userLinks->fb:'#'?>" target="_blank"><img src="/web/site/img/lk_items/fb.png" alt=""></a>
    <a href="<?= (isset($model->userLinks->twitch))?$model->userLinks->twitch:'#'?>" target="_blank"><img src="/web/site/img/lk_items/twich.png" alt=""></a>
    <a href="<?= (isset($model->userLinks->steam))?$model->userLinks->steam:'#'?>" target="_blank"><img src="/web/site/img/lk_items/steam.png" alt=""></a>
    <a href="<?= (isset($model->userLinks->battle_net))?$model->userLinks->battle_net:'#'?>" target="_blank"><img src="/web/site/img/lk_items/battl.png"
                                                                                                                  alt=""></a>
    <a href="<?= (isset($model->userLinks->youtube))?$model->userLinks->youtube:'#'?>" target="_blank"><img src="/web/site/img/lk_items/youtube.png"
                                                                                                            alt=""></a>
    <a href="<?= (isset($model->userLinks->xbox))?$model->userLinks->xbox:'#'?>" target="_blank"><img src="/web/site/img/lk_items/xbox.png" alt=""></a>
    <a href="<?= (isset($model->userLinks->ps))?$model->userLinks->ps:'#'?>" target="_blank"><img src="/web/site/img/lk_items/ps.png" alt=""></a>
</div>
<a class="popup-link" href="#popup-content">
    <div class="lk-button">Написать сообщение</div>
</a>
<div class="wrapper">
    <div class="popup" id="popup-href">
        <div class="popup__body">
            <div class="popup__content">
                <div class="container">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at atque blanditiis debitis nemo pariatur reiciendis similique sit suscipit voluptas!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="popup" id="popup-href2">
        <div class="popup__body">
            <div class="popup__content">
                <div class="container">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at atque blanditiis debitis nemo pariatur reiciendis similique sit suscipit voluptas!</p>
                </div>
            </div>
        </div>
    </div>
</div>


