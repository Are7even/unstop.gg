<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\SiteAsset;
use app\widgets\Alert;
use app\widgets\LanguageSwitch;
use app\widgets\UserLayoutWidget;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

SiteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <div class="container">
        <button class="nav-toggle" id="nav_toggle" type="button">
            <span class="nav-toggle_item">Menu</span>
        </button>
        <div class="social">
            <a href="#" target="_blank">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="#" target="_blank">
                <i class="fab fa-vk"></i>
            </a>
        </div>
        <a href="#"><img class="logo" src="/web/site/img/logo.png" alt="logo"></a>
        <div class="control">

            <div class="control_logout" style="<?= Yii::$app->user->isGuest ? '' : 'display:none'?>">
                <div class="dropdown">
                    <img onclick="myFunction()" class="flag dropbtn" src="/web/upload/<?php echo \app\widgets\LanguageIconWidget::widget(['currentLanguage'=>Yii::$app->language])?>" alt="flag">
                    <div id="myDropdown2" class="dropdown-content">
                        <?php echo LanguageSwitch::widget()?>
                    </div>
                </div>
            </div>

            <div class="control_login" style="<?= !Yii::$app->user->isGuest ? '' : 'display:none'?>">
                <div class="dropdown">
                    <img onclick="myFunction()" class="flag dropbtn" src="/web/upload/<?php echo \app\widgets\LanguageIconWidget::widget(['currentLanguage'=>Yii::$app->language])?>" alt="flag">
                    <div id="myDropdown" class="dropdown-content">
                      <?php echo LanguageSwitch::widget()?>
                    </div>
                </div>
                <img class="swords" src="/web/site/img/swords.png" alt="swords">
                <a class="popup-link" href="#popup-content"><i class="fas fa-comment-alt-lines"></i></a>
                <div class="dropdown dropdown-avatar">
                    <i class="fas fa-bell dropbtn"></i>
                    <div class="red-dot"></div>
                    <div class="dropdown-content">
                        <a href="#">Уведомление от админа</a>
                        <!--                       <a href="#">Уведомление о турнире</a>-->
                        <!--                       <a href="#">обновление правил</a>-->
                        <!--                       <a href="#">Изменение статуса</a>-->
                    </div>
                </div>
                <?php echo UserLayoutWidget::widget(['userId'=>Yii::$app->user->id])?>
            </div>

        </div>
    </div>
    <nav class="nav" id="nav">
        <a class="nav_link" href="<?= Url::to(['site/index'])?>"><p><?=Yii::t('admin','Main')?></p></a>
        <a class="nav_link" href="<?= Url::to(['tournament/index'])?>"><p><?=Yii::t('admin','Tournaments')?></p></a>
        <a class="nav_link" href="leagues.html"><p>Лиги</p></a>
        <a class="nav_link" href="news.html"><p>Новости</p></a>
        <a class="nav_link" href="top100.html"><p>Топ 100</p></a>
        <a class="nav_link" href="#"><p>О нас</p></a>
        <a class="nav_link" href="#"><p>Авторизация</p></a>
        <a class="nav_link" href="#"><p>Регистрация</p></a>
        <a class="nav_link" href="#"><p>Личный кабинет</p></a>
        <div class="nav__inner">
            <div>
                <a href="#">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </div>
            <div>
                <a href="#">
                    <i class="fab fa-vk"></i>
                </a>
            </div>
            <a href="#" class="nav__item-logo-close" id="nav__close">
                <i class="fas fa-times"></i>
            </a>
        </div>
    </nav>
</div>
<nav class="nav">
    <div class="container">
        <ul>
            <li><a href="<?= Url::to(['site/index'])?>"><?=Yii::t('admin','Main')?></a></li>
            <li><a href="<?= Url::to(['tournament/index'])?>"><?=Yii::t('admin','Tournaments')?></a></li>
            <li><a href="leagues.html">Лиги</a></li>
            <li><a href="news.html">Новости</a></li>
            <li><a class="gold_text" href="top100.html">Топ 100</a></li>
            <li><a href="#">О нас</a></li>
        </ul>
    </div>
</nav>

<div class="wrapper">
    <div class="popup" id="popup-content">
        <div class="popup__body">
            <div class="popup__content">
                <div class="container">
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="inbox_chat">
                                    <div class="chat_list active_chat">
                                        <div class="chat_people">
                                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                                            <div class="chat_ib">
                                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                <p>Test, which is a new approach to have all solutions
                                                    astrology under one roof.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mesgs">
                                <div class="msg_history">

                                    <div class="incoming_msg" id="chat">

                                    </div>

                                </div>
<!--                                <div class="type_msg">-->
<!--                                    <div class="input_msg_write">-->
<!--                                        <input type="text" class="write_msg" placeholder="Type a message"/>-->
<!--                                        <button class="msg_send_btn" type="button"><i class="fal fa-paper-plane" aria-hidden="true"></i></button>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $content ?>

<div class="footer">
    <div class="container">
        <div class="footer-href">
            <a href="#">Политика конфиденциальности</a>
            <a href="#">Пользовательское соглашение</a>
        </div>
        <div class="info">Copyright © unstop.gg 2020 All Rights Reserved</div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
