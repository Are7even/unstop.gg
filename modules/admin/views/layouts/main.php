<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Language;
use app\widgets\Alert;
use app\widgets\LanguageSwitch;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <?php $this->head() ?>
</head>
<body class="fixed-left">
<?php $this->beginBody() ?>

    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="<?php echo Url::to(['/admin/default'])?>" class="logo"><img src="/web/admin/assets/images/logo.png" alt=""></a>
                    <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="<?php echo Url::to(['/admin/user'])?>" class="waves-effect"><i class="mdi mdi-account"></i><span><?php echo Yii::t('admin','User')?></span></a>
                        </li>

                        <li>
                            <a href="<?php echo Url::to(['/admin/games'])?>" class="waves-effect"><i class="mdi mdi-gamepad-down"></i><span><?php echo Yii::t('admin','Games')?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/admin/genre'])?>" class="waves-effect"><i class="mdi mdi-gamepad-variant"></i><span><?php echo Yii::t('admin','Genre')?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/admin/gifts'])?>" class="waves-effect"><i class="mdi mdi-trophy-award"></i><span><?php echo Yii::t('admin','Gifts')?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/admin/stage'])?>" class="waves-effect"><i class="mdi mdi-truck-fast"></i><span><?php echo Yii::t('admin','Stage')?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/admin/tournament'])?>" class="waves-effect"><i class="mdi mdi-tournament"></i><span><?php echo Yii::t('admin','Tournament')?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/admin/language'])?>" class="waves-effect"><i class="mdi mdi-flag-variant"></i><span><?php echo Yii::t('admin','Language')?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/rbac'])?>" class="waves-effect"><i class="mdi mdi-flag-variant"></i><span><?php echo Yii::t('admin','Roles')?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/admin/advertisement'])?>" class="waves-effect"><i class="mdi mdi-flag-variant"></i><span><?php echo Yii::t('admin','Advertisement')?></span></a>
                        </li>
                        <li>
                            <a href="<?= Url::home()?>" class="waves-effect">
                                <i class="mdi mdi-power"></i>
                                <span><?php echo Yii::t('admin','Exit')?></span>
                            </a>

<!--                            <a href="logout.html" class="waves-effect"><i class="mdi mdi-power"></i><span> Logout </span></a>-->
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-inline float-right mb-0">
                            <!-- language-->
                            <li class="list-inline-item dropdown notification-list hide-phone">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect text-white" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">

                                    <?php echo \app\widgets\CurrentLanguage::widget(['language_code'=>Yii::$app->language]); ?>

<!--                                    --><?php //$languages = Language::find()->where(['status' => true])->all() ?>
<!--                                    --><?php
//                                    foreach ($languages as $language):
//                                        echo Yii::$app->language;
//                                    endforeach;
//                                    ?>
                                    <img src="/web/admin/assets/images/flags/us_flag.jpg" class="ml-2" height="16" alt=""/>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right language-switch">
                                    <?php echo LanguageSwitch::widget()?>
                                    <a class="dropdown-item" href="#"><img src="/web/admin/assets/images/flags/italy_flag.jpg" alt="" height="16"/><span> Italian </span></a>
                                    <a class="dropdown-item" href="#"><img src="/web/admin/assets/images/flags/french_flag.jpg" alt="" height="16"/><span> French </span></a>
                                    <a class="dropdown-item" href="#"><img src="/web/admin/assets/images/flags/spain_flag.jpg" alt="" height="16"/><span> Spanish </span></a>
                                    <a class="dropdown-item" href="#"><img src="/web/admin/assets/images/flags/russia_flag.jpg" alt="" height="16"/><span> Russian </span></a>
                                </div>
                            </li>
<!--                            <li class="list-inline-item dropdown notification-list">-->
<!--                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"-->
<!--                                   aria-haspopup="false" aria-expanded="false">-->
<!--                                    <i class="ti-email noti-icon"></i>-->
<!--                                    <span class="badge badge-danger noti-icon-badge">5</span>-->
<!--                                </a>-->
<!--                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">-->
<!--        -->
<!--                                    <div class="dropdown-item noti-title">-->
<!--                                        <h5><span class="badge badge-danger float-right">745</span>Messages</h5>-->
<!--                                    </div>-->
<!---->
<!--           -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        <div class="notify-icon"><img src="assets//web/admin/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>-->
<!--                                        <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>-->
<!--                                    </a>-->
<!---->
<!--              -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        <div class="notify-icon"><img src="assets//web/admin/images/users/avatar-3.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>-->
<!--                                        <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You have 87 unread messages</small></p>-->
<!--                                    </a>-->
<!---->
<!--                 -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        <div class="notify-icon"><img src="assets/images/users/avatar-4.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>-->
<!--                                        <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a long established fact that a reader will</small></p>-->
<!--                                    </a>-->
<!---->
<!--                -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        View All-->
<!--                                    </a>-->
<!---->
<!--                                </div>-->
<!--                            </li>-->

<!--                            <li class="list-inline-item dropdown notification-list">-->
<!--                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"-->
<!--                                   aria-haspopup="false" aria-expanded="false">-->
<!--                                    <i class="ti-bell noti-icon"></i>-->
<!--                                    <span class="badge badge-success noti-icon-badge">23</span>-->
<!--                                </a>-->
<!--                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">-->
<!--                  -->
<!--                                    <div class="dropdown-item noti-title">-->
<!--                                        <h5><span class="badge badge-danger float-right">87</span>Notification</h5>-->
<!--                                    </div>-->
<!---->
<!--              -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>-->
<!--                                        <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>-->
<!--                                    </a>-->
<!---->
<!--           -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>-->
<!--                                        <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>-->
<!--                                    </a>-->
<!---->
<!--                       -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>-->
<!--                                        <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>-->
<!--                                    </a>-->
<!---->
<!--            -->
<!--                                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
<!--                                        View All-->
<!--                                    </a>-->
<!---->
<!--                                </div>-->
<!--                            </li>-->

<!--                            <li class="list-inline-item dropdown notification-list">-->
<!--                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"-->
<!--                                   aria-haspopup="false" aria-expanded="false">-->
<!--                                    <img src="images/users/avatar-1.jpg" alt="user" class="rounded-circle">-->
<!--                                </a>-->
<!--                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">-->
<!--                             -->
<!--                                    <div class="dropdown-item noti-title">-->
<!--                                        <h5>Welcome</h5>-->
<!--                                    </div>-->
<!--                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>-->
<!--                                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My Wallet</a>-->
<!--                                    <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>-->
<!--                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>-->
<!--                                    <div class="dropdown-divider"></div>-->
<!--                                    <a class="dropdown-item" href="#"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>-->
<!--                                </div>-->
<!--                            </li>-->

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left waves-light waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
<!--                            <li class="hide-phone app-search">-->
<!--                                <form role="search" class="">-->
<!--                                    <input type="text" placeholder="Search..." class="form-control">-->
<!--                                    <a href=""><i class="fa fa-search"></i></a>-->
<!--                                </form>-->
<!--                            </li>-->
                        </ul>

                        <div class="clearfix"></div>

                    </nav>

                </div>
                <!-- Top Bar End -->

<!--                --><?//= Breadcrumbs::widget([
//                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                ]) ?>
<!--                --><?//= Alert::widget() ?>


                <div class="page-content-wrapper ">
                    <?= $content ?>

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                &copy; Unstop.gg <?= date('Y') ?>
            </footer>

        </div>
        <!-- End Right content here -->
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
