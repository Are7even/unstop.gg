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

                        <div class="page__item" id="page__tabs">
                            <div class="page__tabs__inner">
                                <div class="page__tabs">
                                    <div class="page__tabs__item active js-tab-trigger" data-tab="6"><?= Yii::t('admin','Reputation')?></div>
                                    <div class="page__tabs__item js-tab-trigger" data-tab="7"><?= Yii::t('admin','Kudo')?></div>
                                </div>
                                <div class="page__tabs-content">
                                    <div class="page__tabs-content__item active js-tab-content" data-tab="6">
                                        <div class="page__item-content">
                                            <div class="game archive-game-rating">
                                                <div class="game-container">
                                                    <div href="#">
                                                        <img src="/web/site/img/cs.jpg" alt="">
                                                        <div class="game-title">
                                                            Cs go tournament from 07/22/2020
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="game-container">
                                                    <div href="#">
                                                        <img src="/web/site/img/cs.jpg" alt="">
                                                        <div class="game-title">
                                                            FIFA2020 tournament from 03/22/2020

                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="game-container">
                                                    <div href="#">
                                                        <img src="/web/site/img/cs.jpg" alt="">
                                                        <div class="game-title">
                                                            DOTA 2 tournament from 01/22/2020
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                        <div class="archive-kudo-list">
                                                            <div class="rating">
                                                                +30
                                                            </div>
                                                            <div class="game">
                                                                Cs Go
                                                            </div>
                                                            <div class="text">
                                                                За создание турнира
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                    <div class="page__tabs-content__item js-tab-content" data-tab="7">
                                        <div class="archive-kudo-list">
                                            <div class="rating">
                                                +30
                                            </div>
                                            <div class="game">
                                                Cs Go
                                            </div>
                                            <div class="text">
                                                За создание турнира
                                            </div>
                                        </div>
                                        <div class="archive-kudo-list">
                                            <div class="rating">
                                                +30
                                            </div>
                                            <div class="game">
                                                Cs Go
                                            </div>
                                            <div class="text">
                                                За создание турнира
                                            </div>
                                        </div>
                                        <div class="archive-kudo-list">
                                            <div class="rating">
                                                +30
                                            </div>
                                            <div class="game">
                                                Cs Go
                                            </div>
                                            <div class="text">
                                                За создание турнира
                                            </div>
                                        </div>
                                        <div class="archive-kudo-list">
                                            <div class="rating">
                                                +30
                                            </div>
                                            <div class="game">
                                                Cs Go
                                            </div>
                                            <div class="text">
                                                За создание турнира
                                            </div>
                                        </div>
                                        <div class="archive-kudo-list">
                                            <div class="rating">
                                                +30
                                            </div>
                                            <div class="game">
                                                Cs Go
                                            </div>
                                            <div class="text">
                                                За создание турнира
                                            </div>
                                        </div>
                                        <div class="archive-kudo-list">
                                            <div class="rating">
                                                +30
                                            </div>
                                            <div class="game">
                                                Cs Go
                                            </div>
                                            <div class="text">
                                                За создание турнира
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
</div>




