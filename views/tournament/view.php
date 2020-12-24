<?php use app\helpers\StatusHelper;
use app\helpers\TournamentTypeHelper;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);

?>
<div class="container">
    <div class="content ">
        <div class="content-body tournament-menu">
            <div class="lk-menu">
                <div class="lk-nav">
                    <?php if (!Yii::$app->user->isGuest):?>
                    <ul>
                        <?php if ($tournament->status == \app\helpers\TournamentStatusHelper::$fighting): ?>
                        <li class="menu-link"><a
                                    href="<?= Url::to(['tournament/view', 'id' => $tournament->id]) ?>"><?= Yii::t('admin', 'Overview') ?></a>
                        </li>
                        <li class="menu-link"><a href="#">Current</a></li>
                        <li class="menu-link"><a
                                    href="<?= Url::to(['tournament/fight', 'tournamentId' => $tournament->id]) ?>"><?= Yii::t('admin', 'Fight') ?></a>
                        </li>
                        <li class="menu-link"><a
                                    href="<?= Url::to(['tournament/results', 'tournamentId' => $tournament->id]) ?>"><?= Yii::t('admin', 'Results') ?></a>
                        </li>
                        <?php endif;?>
                    </ul>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="content-body tr">
            <div class="tournament-container">
                <div class="tournament-image">
                    <img src="/web/upload/<?= $tournament->icon ?>" alt="">
                    <div class="tournament-text">
                        <?= $tournament->header ?>
                    </div>
                </div>
                <div class="tournament-table">
                    <div class="">
                        <p><?= ($tournament->type == TournamentTypeHelper::$group) ? Yii::t('admin', 'Group') : Yii::t('admin', 'Individual') ?> <?= Yii::t('admin', 'tournament') ?></p>
                        <p><?= Yii::t('admin', 'Registration start') ?>:
                            <br> <?= $tournament->getCutDate($tournament->checkin_start) ?></p>
                        <p><?= Yii::t('admin', 'Rating') ?>:
                            <br> <?= ($tournament->rating_on == StatusHelper::$active) ? Yii::t('admin', 'Active') : Yii::t('admin', 'Draft') ?>
                        </p>
                        <p class="last"><?= Yii::t('admin', 'Max players') ?> <?= $tournament->players_count ?></p>
                    </div>
                    <div class="">
                        <p><?= Yii::t('admin', 'Checkin') ?>:
                            <br> <?= ($tournament->checkin == StatusHelper::$active) ? Yii::t('admin', 'Active') : Yii::t('admin', 'Draft') ?>
                        </p>
                        <p><?= Yii::t('admin', 'Tournament start') ?>:
                            <br> <?= $tournament->getCutDate($tournament->start) ?></p>
                        <p><?= Yii::t('admin', 'Tournament end') ?>:
                            <br> <?= $tournament->getCutDate($tournament->end) ?></p>
                        <p class="last"><?= Yii::t('admin', 'Registration end') ?>:
                            <br> <?= $tournament->getCutDate($tournament->checkin_end) ?></p>
                    </div>
                </div>
                <div class="tournament-buttons game-container">
                    <div class="button"><?= Yii::t('admin','About tournament')?> <i class="fal fa-plus"></i>
                    <div class="panel"><?= $tournament->text ?></div>
                    </div>
                </div>
                <div class="reg-container">
                    <?php if ($tournament->author == Yii::$app->user->id): ?>
                        <?php if ($tournament->status == \app\helpers\TournamentStatusHelper::$waiting): ?>
                            <div class="button-registration">
                                <?= \yii\helpers\Html::a(Yii::t('admin', 'Start tournament'), '#'.$tournament->id, ['id' => 'start-tournament']) ?>
                            </div>
                        <?php endif; ?>
                    <?php elseif (!$tournament->checkRegistration(Yii::$app->user->id, $tournament->id)): ?>
                        <div class="button-registration">
                            <?= \yii\helpers\Html::a(Yii::t('admin', 'Registration'), Url::to(['tournament/registration', 'tournamentId' => $tournament->id])); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?= \app\widgets\UserTournamentWidget::widget(['tournamentId' => $tournament->id]) ?>
                <?php if ($tournament->status == \app\helpers\TournamentStatusHelper::$fighting || $tournament->status == \app\helpers\TournamentStatusHelper::$end ): ?>
                <div class="tournament-grid" id="list">
                    <div class="tournament" id="tournament-bracket">
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>