<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
 $this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',['position'=>View::POS_HEAD]);
?>
<?php if (Yii::$app->session->getFlash('registration')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo Yii::$app->session->getFlash('registration'); ?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="content">
        <div class="content-body">
            <div class="news-block">
                <div class="swiper-container gallery-top">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper ">
                        <!-- Slides -->
                        <div class="swiper-slide popup-link">
                            <a class="popup-link" href="#popup">
                                <img src="/web/site/img/fifa.png" alt="">
                                <div class="slide-text">
                                    <div class="title">
                                        Cs Go Tournament
                                    </div>
                                    <div class="subtitle">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="popup-link" href="#popup">
                                <img src="/web/site/img/cs.jpg" alt="">
                                <div class="slide-text">
                                    <div class="title">
                                        Cs Go Tournament
                                    </div>
                                    <div class="subtitle">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="popup-link" href="#popup">
                                <img src="/web/site/img/cs.jpg" alt="">
                                <div class="slide-text">
                                    <div class="title">
                                        Cs Go Tournament
                                    </div>
                                    <div class="subtitle">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--                    <div class="swiper-button-prev"></div>-->
                    <!--                    <div class="swiper-button-next"></div>-->
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a class="popup-link" href="#popup">
                                <img src="/web/site/img/fifa.png" alt="">
                                <div class="slide-text">
                                    <div class="subtitle">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="popup-link" href="#popup">
                                <img src="/web/site/img/cs.jpg" alt="">
                                <div class="slide-text">
                                    <div class="subtitle">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="popup-link" href="#popup">
                                <img src="/web/site/img/cs.jpg" alt="">
                                <div class="slide-text">
                                    <div class="subtitle">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="match">
                <div class="match-title">
                    Active matches
                </div>

                <?php echo \app\widgets\TournamentIndexWidget::widget(['status' => \app\helpers\TournamentStatusHelper::$fighting]) ?>

                <div class="match-title ongoing">
                    Ongoing matches
                </div>

                <?php echo \app\widgets\TournamentIndexWidget::widget(['status' => \app\helpers\TournamentStatusHelper::$waiting]) ?>


            </div>
            <!--            <div>-->
            <!--                <iframe width="100%" height="400" src="https://www.youtube.com/embed/bBB_9M49ZeE" frameborder="0"-->
            <!--                        allowfullscreen></iframe>-->
            <!--            </div>-->
        </div>
        <div class="aside">
            <?php if (Yii::$app->user->isGuest): ?>
                <div class="limiter forms">

                    <?php include(Yii::getAlias('@app/views/auth/login.php')); ?>

                    <?php $form = ActiveForm::begin([
                        'id' => 'registration-form',
                        'layout' => 'horizontal',
                        'action' => '/',
                        'class' => 'login-form register-form validate-form',
                    ]); ?>
                    <?= $form->field($registration, 'formId')->hiddenInput([
                        'value' => 'registration-form',
                        'name' => 'formId'
                    ])->label(false) ?>

                    <span class="form-title"><?php echo Yii::t('admin', 'Registration') ?></span>
                    <?= $form->field($registration, 'username')->textInput([
                        'class' => 'input100',
                        'placeholder' => 'username',
                        'type' => 'text',
                        'name' => 'username',
                    ])->label(false) ?>

                    <?= $form->field($registration, 'first_name')->textInput([
                        'class' => 'input100',
                        'placeholder' => 'first name',
                        'type' => 'text',
                        'name' => 'first name',
                    ])->label(false) ?>

                    <?= $form->field($registration, 'last_name')->textInput([
                        'class' => 'input100',
                        'placeholder' => 'last name',
                        'type' => 'text',
                        'name' => 'last name',
                    ])->label(false) ?>

                    <?= $form->field($registration, 'email')->textInput([
                        'class' => 'input100',
                        'placeholder' => 'email',
                        'type' => 'text',
                        'name' => 'email',
                    ])->label(false) ?>

                    <?= $form->field($registration, 'password')->passwordInput([
                        'class' => 'input100',
                        'placeholder' => 'password',
                        'type' => 'password',
                        'name' => 'password',
                    ])->label(false) ?>

                    <div class="text-center">
                        <?php echo Yii::t('admin', 'By clicking on the Register button, you accept our ') ?> <a
                                class="register-href"
                                href="#">
                            <span><?php echo Yii::t('admin', 'terms of use ') ?></span></a> <?php echo Yii::t('admin', 'project') ?>
                        .
                    </div>

                    <?= Html::submitButton('Register now', ['class' => 'login100-form-btn', 'name' => 'registration-button']) ?>

                    <?php ActiveForm::end(); ?>


                    <?php $form = ActiveForm::begin([
                        'id' => 'forgot-password-form',
                        'layout' => 'horizontal',
                        'action' => '/',
                        'class' => 'login-form password-recovery validate-form',
                    ]); ?>

                    <?= $form->field($forgotPasswordForm, 'formId')->hiddenInput([
                        'value' => 'forgot-password-form',
                        'name' => 'formId'
                    ])->label(false) ?>

                    <span class="form-title"><?php echo Yii::t('admin', 'Password recovery') ?></span>
                    <?= $form->field($forgotPasswordForm, 'email')->textInput([
                        'class' => 'input100',
                        'placeholder' => 'email',
                        'type' => 'text',
                        'name' => 'email',
                    ])->label(false) ?>

                    <?= Html::submitButton(Yii::t('admin', 'Recovery'), ['class' => 'login100-form-btn', 'name' => 'forgot-password-button']) ?>

                    <div class="text-center">
                        <?php if (Yii::$app->session->getFlash('reset-password')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo Yii::$app->session->getFlash('reset-password'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (Yii::$app->session->getFlash('reset-password-sanded')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo Yii::$app->session->getFlash('reset-password-sanded'); ?>
                            </div>
                        <?php endif; ?>

                        <a href="#" class="txt1">Авторизироваться</a>
                        <a href="#" class="txt1">Нет учетной записи? Зарегестрируйтесь</a>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            <?php endif; ?>

            <div class="limiter rating" id="game-rating">
                <img src="/web/site/img/corona.png" alt="" class="rating-logo">
                <div class="rating-title">Top players</div>
                <select>
                    <option disabled hidden>Выберите игру</option>
                    <?php foreach ($games as $key => $game):?>
                    <option <?= $key == 0 ? 'selected' : '' ?> value="<?php echo $game->name?>"><?php echo $game->name?></option>
                    <?php endforeach;?>
                </select>
                <?php foreach ($games as $key => $game):?>
                <div class="dropdownlist <?= $key !== 0 ? 'shadow' : '' ?>" id="<?php echo $game->name?>">
                    <?php echo \app\widgets\TopPlayersWidget::widget(['gamesId' => $game->id]) ?>
                </div>
                <?php endforeach;?>


                <div class="limiter advertising">
                    <div class="advertising-title">
                        Advertising
                    </div>
                    <?php echo \app\widgets\AdvertisementWidget::widget() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="popup" id="popup">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="#" class="popup__close close-popup">
                        <i class="fas fa-times"></i>
                    </a>
                    <div class="info-block">
                        <img src="/web/site/img/cs.jpg" alt="">
                        <div class="info">
                            <div class="button">на форум</div>
                            <div class="icons">
                                <div><i class="fas fa-heart"></i><br>22</div>
                                <div><i class="fas fa-share-alt"></i><br>22</div>
                            </div>
                        </div>
                    </div>
                    <div class="text">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore et
                        dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                        rebum. Stet
                        clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
                        sit
                        amet,
                        consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                        aliquyam erat,
                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                        gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                        sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At
                        vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus est
                        Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy
                        eirmod
                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                        accusam
                        et justo
                        duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
                        dolor
                        sit amet
                        <div class="autor">
                            Author
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
