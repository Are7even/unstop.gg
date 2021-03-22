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

                        <div class="lk-history-content">
                            <div class="lk-history-panel">
                                <div class="buttons-container">
                                    <div class="status">
                                        Статус:
                                    </div>
                                    <div class="buttons">
                                        Все
                                        <input type="radio" >
                                    </div>
                                    <div class="buttons">
                                        Предстоящие
                                        <input type="radio">
                                    </div>
                                    <div class="buttons">
                                        Текущие
                                        <input type="radio">
                                    </div>
                                    <div class="buttons">
                                        Завершенные
                                        <input type="radio">
                                    </div>
                                </div>
                                <div class="dropdownlist-container">
                                    <div class="game">
                                        Игра:
                                    </div>
                                    <div onclick="myFunction2()" class="dropbtn dropdown gameslist dropdown-tournaments">
                                        Выберите игру<i class="fas fa-angle-down"></i>
                                        <div id="myDropdown3" class="dropdown-content">
                                            <a href="#">CS GO</a>
                                            <a href="#">FIFA 2020</a>
                                            <a href="#">DOTA 2</a>
                                        </div>
                                    </div>
                                </div>
                                <i class="fas fa-trash"></i>
                            </div>

                            <div class="match-tournament">
                                <img src="/web/site/img/cs.jpg" alt="">
                                <div class="table">
                                    <div class="table-title">
                                        Название:
                                    </div>
                                    <div class="table-text">
                                        Counter Strike Go
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="table-title">
                                        Игроки:
                                    </div>
                                    <div class="table-text">
                                        8/16
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="table-title">
                                        Даты:
                                    </div>
                                    <div class="table-text">
                                        <i class="fas fa-gamepad gm-green"></i> 22.11.2020 <br>
                                        <i class="fas fa-gamepad gm-red"></i> 22.11.2020
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="table-title">
                                        Чекин:
                                    </div>
                                    <div class="table-text">
                                        Открыт
                                    </div>
                                </div>
                                <div class="table">
                                    <div class="table-title">
                                        Статус
                                    </div>
                                    <div class="table-text">
                                        Выбыл с 1/2
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



