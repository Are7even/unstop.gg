<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
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

               <?php echo \app\widgets\TournamentIndexWidget::widget(['status'=>\app\helpers\TournamentStatusHelper::$fighting])?>

                <div class="match-title ongoing">
                    Ongoing matches
                </div>

                <?php echo \app\widgets\TournamentIndexWidget::widget(['status'=>\app\helpers\TournamentStatusHelper::$waiting])?>


            </div>
<!--            <div>-->
<!--                <iframe width="100%" height="400" src="https://www.youtube.com/embed/bBB_9M49ZeE" frameborder="0"-->
<!--                        allowfullscreen></iframe>-->
<!--            </div>-->
        </div>
        <div class="aside">
            <?php if (Yii::$app->user->isGuest):?>
            <div class="limiter forms">

                <?php include(Yii::getAlias('@app/views/auth/login.php')); ?>

                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'layout' => 'horizontal',
                    'action' => '/',
                    'class' => 'login-form register-form validate-form',
                ]); ?>
                <?= $form->field($registration, 'formId')->hiddenInput([
                        'value'=>'registration-form',
                    'name'=>'formId'
                ])->label(false)?>

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
                    <?php echo Yii::t('admin', 'By clicking on the Register button, you accept our ') ?> <a class="register-href"
                                                                                                            href="#">
                        <span><?php echo Yii::t('admin', 'terms of use ') ?></span></a> <?php echo Yii::t('admin', 'project') ?>.
                </div>

                <?= Html::submitButton('Register now', ['class' => 'login100-form-btn', 'name' => 'registration-button']) ?>

                <?php ActiveForm::end(); ?>

                <form class="login-form password-recovery validate-form">
                    <span class="form-title">Восстановление пароля</span>
                    <input class="input100" placeholder="email" type="text" name="email">
                    <button class="login100-form-btn">Восстановить</button>
                    <div class="text-center">
                        <a href="#" class="txt1">Авторизироваться</a>
                        <a href="#" class="txt1">Нет учетной записи? Зарегестрируйтесь</a>
                    </div>
                    <div class="social">
                        <a href="#" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a href="#" target="_blank">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" target="_blank">
                            <i class="fab fa-vk"></i>
                        </a>
                    </div>
                </form>
            </div>
            <?php endif;?>
            <?php if (Yii::$app->session->getFlash('registration')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo Yii::$app->session->getFlash('registration');?>
                </div>
            <?php endif; ?>
            <div class="limiter rating" id="game-rating">
                <img src="/web/site/img/corona.png" alt="" class="rating-logo">
                <div class="rating-title">Top players</div>
                <select>
                    <option disabled hidden>Выберите игру</option>
                    <option selected value="CS_GO">CS GO</option>
                    <option value="FIFA_2020">FIFA 2020</option>
                    <option value="DOTA_2">DOTA 2</option>
                </select>
                <div class="dropdownlist" id="CS_GO">
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">CS GO</div>
                        <div class="rang rang-1">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Открыт</div>
                        <div class="rang rang-2">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Gambit</div>
                        <div class="rang rang-3">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Petrovich</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">JasonStathem</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Открыт</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Gambit</div>
                        <div class="rang">22341</div>
                    </div>
                    <!--                    <div class="rating-list">-->
                    <!--                        <div class="icon-background">-->
                    <!--                            <i class="fal fa-user-friends"></i>-->
                    <!--                        </div>-->
                    <!--                        <div class="name">JasonStathem</div>-->
                    <!--                        <div class="rang ">22341</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="rating-list">-->
                    <!--                        <div class="icon-background">-->
                    <!--                            <i class="fal fa-user-friends"></i>-->
                    <!--                        </div>-->
                    <!--                        <div class="name">JasonStathem</div>-->
                    <!--                        <div class="rang ">22341</div>-->
                    <!--                    </div>-->
                </div>
                <div class="dropdownlist shadow" id="FIFA_2020">
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">FIFA_2020</div>
                        <div class="rang rang-1">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Открыт</div>
                        <div class="rang rang-2">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Gambit</div>
                        <div class="rang rang-3">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Petrovich</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">JasonStathem</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Открыт</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Gambit</div>
                        <div class="rang">22341</div>
                    </div>
                    <!--                    <div class="rating-list">-->
                    <!--                        <div class="icon-background">-->
                    <!--                            <i class="fal fa-user-friends"></i>-->
                    <!--                        </div>-->
                    <!--                        <div class="name">JasonStathem</div>-->
                    <!--                        <div class="rang ">22341</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="rating-list">-->
                    <!--                        <div class="icon-background">-->
                    <!--                            <i class="fal fa-user-friends"></i>-->
                    <!--                        </div>-->
                    <!--                        <div class="name">JasonStathem</div>-->
                    <!--                        <div class="rang ">22341</div>-->
                    <!--                    </div>-->
                </div>
                <div class="dropdownlist shadow" id="DOTA_2">
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">DOTA_2</div>
                        <div class="rang rang-1">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Открыт</div>
                        <div class="rang rang-2">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Gambit</div>
                        <div class="rang rang-3">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Petrovich</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">JasonStathem</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Открыт</div>
                        <div class="rang">22341</div>
                    </div>
                    <div class="rating-list">
                        <div class="icon-background">
                            <i class="fal fa-user-friends"></i>
                        </div>
                        <div class="name">Gambit</div>
                        <div class="rang">22341</div>
                    </div>
                </div>

            </div>
            <div class="limiter advertising">
                <div class="advertising-title">
                    Advertising
                </div>
                    <?php echo \app\widgets\AdvertisementWidget::widget()?>
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
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et
                    dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                    rebum. Stet
                    clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
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
                    Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod
                    tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                    et justo
                    duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                    sit amet
                    <div class="autor">
                        Author
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
