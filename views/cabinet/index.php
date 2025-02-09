<?php use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);
$userId = $user->id;
?>

<div class="container">
    <div class="content">
        <div class="content-body tr">
            <div class="lk-container ">
                <div class="lk-menu">
                    <?php if ($userId === Yii::$app->user->id):?>
                    <div class="lk-nav">
                        <ul>
                            <li class="menu-link"><?= Html::a(Yii::t('admin', 'Profile'), Url::to(['cabinet/index', 'id' => $userId])) ?></li>
                            <li class="menu-link"><?= Html::a(Yii::t('admin', 'Tournament history'), Url::to(['cabinet/history', 'id' => $userId])) ?></li>
                            <li class="menu-link"><?= Html::a(Yii::t('admin', 'Matches history'), Url::to(['cabinet/matches', 'id' => $userId])) ?></li>
                            <li class="menu-link"><?= Html::a(Yii::t('admin', 'Archive'), Url::to(['cabinet/rating', 'id' => $userId])) ?></li>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>
                <div class="tabs-content">
                    <div class="lk-content">

                        <?= \app\widgets\UserCabinetWidget::widget(['userId' => $userId]) ?>

                        <div class="page__item" id="page__tabs">
                            <div class="page__tabs__inner">
                                <div class="page__tabs">
                                    <?php if ($userId !== Yii::$app->user->id):?>
                                    <div class="page__tabs__item active js-tab-trigger" data-tab="8">О себе</div>
                                    <div class="page__tabs__item js-tab-trigger" data-tab="9">Награды</div>
                                    <?php elseif ($userId === Yii::$app->user->id):?>
                                    <div class="page__tabs__item active js-tab-trigger" data-tab="6">Мои данные</div>
                                    <div class="page__tabs__item js-tab-trigger" data-tab="7">Мои турниры</div>
                                    <div class="page__tabs__item js-tab-trigger" data-tab="8">О себе</div>
                                    <div class="page__tabs__item js-tab-trigger" data-tab="9">Награды</div>
                                    <?php endif;?>
                                </div>
                                <div class="page__tabs-content">
                                    <?php if ($userId !== Yii::$app->user->id):?>
                                    <div class="page__tabs-content__item active js-tab-content" data-tab="8">
                                        <div class="page__item">
                                            <div class="page__item-content">
                                                <div style="width: 1000px;">
                                                    <?= $user->about ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page__tabs-content__item js-tab-content" data-tab="9">
                                        <div class="page__item">
                                            <div class="page__item-content reward">
                                                <?php foreach ($gifts as $gift): ?>
                                                    <div class="reward-container" style="width: 985px">
                                                        <div class="icons">
                                                            <img src="/web/upload/gifts/<?= $gift->gifts->icon ?>"
                                                                 alt="">
                                                        </div>
                                                        <div class="name"><?= $gift->gifts->title ?></div>
                                                        <div class="text">
                                                            <?= $gift->gifts->description ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php elseif ($userId === Yii::$app->user->id):?>
                                    <div class="page__tabs-content__item active js-tab-content" data-tab="6">
                                        <div class="page__item-content">

                                            <?php $form = ActiveForm::begin(['options' => ['class' => 'lk-form']]) ?>
                                            <span class="form-title"><?= Yii::t('admin', 'Personal information') ?></span>
                                            <?= $form->field($updateForm, 'first_name', ['options' => ['tag' => false]])->textInput([
                                                'value' => $user->first_name,
                                                'placeholder' => 'first name',
                                                'type' => 'text',
                                                'name' => 'first name',
                                                'class' => 'input100',
                                            ]); ?>

                                            <?= $form->field($updateForm, 'last_name', ['options' => ['tag' => false]])->textInput([
                                                'value' => $user->last_name,
                                                'placeholder' => 'last name',
                                                'type' => 'text',
                                                'name' => 'last name',
                                                'class' => 'input100',
                                            ]); ?>

                                            <?= $form->field($updateForm, 'about', ['options' => ['tag' => false]])->textInput([
                                                'value' => $user->about,
                                                'placeholder' => 'about',
                                                'type' => 'text',
                                                'name' => 'about',
                                                'class' => 'input100',
                                            ]); ?>

                                            <div class="text-center">
                                                <span class="form-title">my social networks</span>
                                                <div>

                                                    <?= $form->field($updateForm, 'vk', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->vk,
                                                        'placeholder' => 'vk',
                                                        'type' => 'text',
                                                        'name' => 'vk',
                                                        'class' => 'input100',
                                                    ]); ?>

                                                    <?= $form->field($updateForm, 'fb', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->fb,
                                                        'placeholder' => 'fb',
                                                        'type' => 'text',
                                                        'name' => 'fb',
                                                        'class' => 'input100',
                                                    ]); ?>

                                                    <?= $form->field($updateForm, 'twitch', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->twitch,
                                                        'placeholder' => 'twitch',
                                                        'type' => 'text',
                                                        'name' => 'twitch',
                                                        'class' => 'input100',
                                                    ]); ?>

                                                    <?= $form->field($updateForm, 'steam', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->steam,
                                                        'placeholder' => 'steam',
                                                        'type' => 'text',
                                                        'name' => 'steam',
                                                        'class' => 'input100',
                                                    ]); ?>

                                                    <?= $form->field($updateForm, 'battle_net', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->battle_net,
                                                        'placeholder' => 'battle_net',
                                                        'type' => 'text',
                                                        'name' => 'battle_net',
                                                        'class' => 'input100',
                                                    ]); ?>

                                                    <?= $form->field($updateForm, 'youtube', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->youtube,
                                                        'placeholder' => 'youtube',
                                                        'type' => 'text',
                                                        'name' => 'youtube',
                                                        'class' => 'input100',
                                                    ]); ?>

                                                    <?= $form->field($updateForm, 'xbox', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->xbox,
                                                        'placeholder' => 'xbox',
                                                        'type' => 'text',
                                                        'name' => 'xbox',
                                                        'class' => 'input100',
                                                    ]); ?>

                                                    <?= $form->field($updateForm, 'ps', ['options' => ['tag' => false]])->textInput([
                                                        'value' => $user->userLinks->ps,
                                                        'placeholder' => 'ps',
                                                        'type' => 'text',
                                                        'name' => 'ps',
                                                        'class' => 'input100',
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <?= \yii\helpers\Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'login100-form-btn']) ?>

                                            <?php $form = ActiveForm::end() ?>
                                            <a href="#">
                                                <div class="lk-button">Подтвердить почту</div>
                                            </a>
                                            <?= Html::button("<div class='lk-button'>" . Yii::t('admin', 'Set photo') . "</div>", ['value'=>\yii\helpers\Url::to(['cabinet/photo', 'id' => $userId]),'class' => 'photo-button','id'=>'photo-button']) ?>
                                            <?php
                                            Modal::begin([
                                                'header'=>'<h4>'.Yii::t('admin','Set Photo').'</h4>',
                                                'id'=>'modal',
                                                'size'=>'modal-lg'
                                            ]);

                                            echo "<div id='modalContent'></div>";

                                            Modal::end();
                                            ?>
                                        </div>
                                    </div>
                                    <div class="page__tabs-content__item js-tab-content" data-tab="7">
                                        <?= \app\widgets\TournamentIndexWidget::widget(['author' => Yii::$app->user->id]) ?>
                                    </div>

                                    <div class="page__tabs-content__item js-tab-content" data-tab="8">
                                        <div class="page__item">
                                            <div class="page__item-content">
                                                <div>
                                                    <?= $user->about ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page__tabs-content__item js-tab-content" data-tab="9">
                                        <div class="page__item">
                                            <div class="page__item-content reward">
                                                <?php foreach ($gifts as $gift): ?>
                                                    <div class="reward-container">
                                                        <div class="icons">
                                                            <img src="/web/upload/gifts/<?= $gift->gifts->icon ?>"
                                                                 alt="">
                                                        </div>
                                                        <div class="name"><?= $gift->gifts->title ?></div>
                                                        <div class="text">
                                                            <?= $gift->gifts->description ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lk-content"></div>
                    <div class="lk-content"></div>
                    <div class="lk-content"></div>
                    <div class="lk-content"></div>
                </div>
            </div>
        </div>
    </div>
</div>