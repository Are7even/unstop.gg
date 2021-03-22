<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);
?>
<div class="container">
    <div class="content">
        <div class="content-body">
            <div class="games">
                <div class="game top100">
                    <?php foreach ($games as $key => $game): ?>
                        <div class="game-container">

                            <a href="#">
                                <img src="/web/upload/games/<?= $game->image ?>" alt="">
                                <div class="game-title">
                                    <img src="/web/site/img/corona.png" alt="">
                                    Top 100 <?= $game->name ?>
                                </div>
                            </a>
                            <?php $list = array_chunk(\app\models\UserGameRating::getTopPlayersByGame($game->id), 34, true) ?>
                            <div class="panel rating-panel">
                                <?php foreach ($list as $players): ?>
                                    <div class="panel-container">
                                        <?php foreach ($players as $key => $player):?>
                                        <div class="panel-container-rating">
                                            <div class="number"><?= $key +1?></div>
                                            <div class="rating-list">
                                                <div class="icon-background">
                                                    <i class="fal fa-user-friends"></i>
                                                </div>
                                                <div class="name"><?= \app\models\User::getUsername($player->user_id)?></div>
                                                <div class="rang rang-1"><?= \app\models\UserGameRating::getUserRatingByGame($game->id,$player->user_id)?></div>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <div class="aside">
            <div class="limiter rating" id="game-rating">
                <img src="/web/site/img/corona.png" alt="" class="rating-logo">
                <div class="rating-title">Top players</div>
                <select>
                    <option disabled hidden>Выберите игру</option>
                    <?php foreach ($games as $key => $game): ?>
                        <option <?= $key == 0 ? 'selected' : '' ?>
                                value="<?php echo $game->name ?>"><?php echo $game->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?php foreach ($games as $key => $game): ?>
                    <div class="dropdownlist <?= $key !== 0 ? 'shadow' : '' ?>" id="<?php echo $game->name ?>">
                        <?php echo \app\widgets\TopPlayersWidget::widget(['gamesId' => $game->id]) ?>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="limiter advertising">
                <div class="advertising-title">
                    Advertising
                </div>
                <?php echo \app\widgets\AdvertisementWidget::widget() ?>
            </div>
        </div>
    </div>
</div>