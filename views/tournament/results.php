<?php

use yii\helpers\Url;
use yii\web\View;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);

?>


<div class="faiting">
    <div class="container">
        <div class="content-body">
            <div class="lk-container ">
                <div class="lk-menu">
                    <div class="lk-nav">
                        <ul>
                            <li class="menu-link"><a
                                        href="<?= Url::to(['tournament/view', 'id' => Yii::$app->session['tournamentId']]) ?>"><?= Yii::t('admin', 'Overview') ?></a>
                            </li>
                            <li class="menu-link"><a href="#">Current</a></li>
                            <li class="menu-link"><a
                                        href="<?= Url::to(['tournament/fight', 'tournamentId' => Yii::$app->session['tournamentId']]) ?>"><?= Yii::t('admin', 'Fight') ?></a>
                            </li>
                            <li class="menu-link"><a
                                        href="<?= Url::to(['tournament/results', 'tournamentId' => Yii::$app->session['tournamentId']]) ?>"><?= Yii::t('admin', 'Results') ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="faiting-container faiting-result result-fight">
                    <div class="lk-matches-content">
                        <?= \app\widgets\FightWidget::widget(['tournamentId' => Yii::$app->session['tournamentId']]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





