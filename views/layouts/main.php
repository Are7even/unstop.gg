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
            <?php if (Yii::$app->user->isGuest):?>
            <div class="control_logout">
                <div class="dropdown">
                    <img onclick="myFunction()" class="flag dropbtn" src="/web/site/img/us_flag.jpg" alt="flag">
                    <div id="myDropdown2" class="dropdown-content">
                        <a href="#"><?php echo LanguageSwitch::widget()?><img class="flag" src="/web/site/img/russia_flag.jpg" alt="flag"></a>
                        <a href="#">English<img class="flag" src="/web/site/img/us_flag.jpg" alt="flag"></a>
                    </div>
                </div>
            </div>
            <?php else:?>
            <div class="control_login">
                <div class="dropdown">
                    <img onclick="myFunction()" class="flag dropbtn" src="/web/upload/<?php echo \app\widgets\LanguageIconWidget::widget(['currentLanguage'=>Yii::$app->language])?>" alt="flag">
                    <div id="myDropdown" class="dropdown-content">
                      <?php echo LanguageSwitch::widget()?>
                    </div>
                </div>
                <img class="swords" src="/web/site/img/swords.png" alt="swords">
                <i class="fas fa-comment-alt-lines"></i>
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
            <?php endif;?>
        </div>
    </div>
    <nav class="nav" id="nav">
        <a class="nav_link" href="index.html"><p>Главная</p></a>
        <a class="nav_link" href="tournaments.html"><p>Турниры</p></a>
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
            <li><a href="index.html">Главная</a></li>
            <li><a href="tournaments.html">Турниры</a></li>
            <li><a href="leagues.html">Лиги</a></li>
            <li><a href="news.html">Новости</a></li>
            <li><a class="gold_text" href="top100.html">Топ 100</a></li>
            <li><a href="#">О нас</a></li>
        </ul>
    </div>
</nav>

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
