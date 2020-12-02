<?php use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);
$userId = Yii::$app->user->id;
?>
<div class="container">
    <div class="content">
        <div class="content-body tr">
            <div class="lk-container ">
                <div class="lk-menu">
                    <div class="lk-nav">
                        <ul>
                            <li class="menu-link"><?= Html::a(Yii::t('admin','Profile'),Url::to(['cabinet/index','id'=>$userId]))?></li>
                            <li class="menu-link"><?= Html::a(Yii::t('admin','Tournament history'),Url::to(['cabinet/history','id'=>$userId]))?></li>
                            <li class="menu-link"><?= Html::a(Yii::t('admin','Matches history'),Url::to(['cabinet/matches','id'=>$userId]))?></li>
                            <li class="menu-link"><?= Html::a(Yii::t('admin','Archive'),Url::to(['cabinet/rating','id'=>$userId]))?></li>
                        </ul>
                    </div>
                </div>
                <div class="tabs-content">
                    <div class="lk-content">
                        <?= \app\widgets\UserCabinetWidget::widget(['userId' => Yii::$app->user->id]) ?>
                        <div class="lk-matches-content">

                            <div class="match-tournament">
                                <div class="table-content">
                                    <img src="/web/site/img/cs.jpg" alt="">
                                    <div class="table">
                                        <div class="table-title">
                                            Ник
                                        </div>
                                        <div class="table-text">
                                            Alison
                                        </div>
                                    </div>
                                    <div class="table">
                                        <div class="table-title">
                                            Очки
                                        </div>
                                        <div class="table-text">
                                            2
                                        </div>
                                    </div>
                                </div>
                                <div class="table table-date">
                                    <div class="table-title">
                                        Даты:
                                    </div>
                                    <div class="table-text">
                                        <i class="fas fa-gamepad gm-green"></i> 22.11.2020 <br>
                                        <i class="fas fa-gamepad gm-red"></i> 22.11.2020
                                    </div>
                                </div>
                                <div class="table-content">
                                    <img src="/web/site/img/cs.jpg" alt="">
                                    <div class="table">
                                        <div class="table-title">
                                            Ник
                                        </div>
                                        <div class="table-text">
                                            Jessy
                                        </div>
                                    </div>
                                    <div class="table">
                                        <div class="table-title">
                                            Очки
                                        </div>
                                        <div class="table-text">
                                            1
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



