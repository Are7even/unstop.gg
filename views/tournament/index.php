<?php use yii\helpers\Html;

use yii\widgets\ActiveForm;
use yii\web\View;
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);

?>

<div class="container">
    <div class="content">
        <div class="content-body" id="game">
            <div onclick="myFunction2()" class="dropbtn dropdown gameslist dropdown-tournaments">
                Выберите игру<i class="fas fa-angle-down"></i>
                <div id="myDropdown3" class="dropdown-content">
                    <a href="#">Турниры по CS GO</a>
                    <a href="#">Турниры по FIFA 2020</a>
                    <a href="#">Турниры по DOTA 2</a>
                </div>
            </div>
            <div class="games">

            <?= \app\widgets\TournamentWidget::widget()?>

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