<?php

use app\helpers\StatusHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="match-tournament">
    <img src="<?php echo $model->getIcon() ?>" alt="">
    <div class="table">
        <div class="table-title">
            Название:
        </div>
        <div class="table-text">
            <?php echo $model->header ?>
        </div>
    </div>
    <div class="table">
        <div class="table-title">
            Игроки:
        </div>
        <div class="table-text">
            <?php echo $model->players_count ?>
        </div>
    </div>
    <div class="table">
        <div class="table-title">
            Даты:
        </div>
        <div class="table-text">
            <i class="fas fa-gamepad gm-green"></i> <?php echo $model->getCutDate($model->start); ?> <br>
            <i class="fas fa-gamepad gm-red"></i> <?php echo $model->getCutDate($model->end); ?>
        </div>
    </div>
    <div class="table">
        <div class="table-title">
            Чекин:
        </div>
        <div class="table-text">
            <?php echo ($model->checkin === StatusHelper::$active) ? Yii::t('admin', 'Open') : Yii::t('admin', 'Closed'); ?>
        </div>
    </div>

        <?= Html::a(Yii::t('admin', 'View tournament'), Url::toRoute(['tournament/view','id'=>$model->id]), ['style' => 'color:white;text-align:center','class'=>'table-button']) ?>

</div>

<div class="swiper-container sliderMobile">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="match-tournament match-tournament-mobile">
                <img src="/web/site/img/cs.jpg" alt="">
                <div class="table-container">
                    <div class="table">
                        <div class="table-title">
                            Название:
                        </div>
                        <div class="table-text">
                            <?php echo $model->header ?>
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
                    </div>
                </div>
                <div class="table-button">
                    К турниру
                </div>
            </div>
        </div>
    </div>
</div>