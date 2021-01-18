<?php

use yii\helpers\Url;
use yii\web\View;
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);
$isHasConflict = (
    $status->active &&
    $status->first_user_id_status != $statuses['unset'] &&
    $status->second_user_id_status != $statuses['unset'] &&
    $status->first_user_id_status == $status->second_user_id_status
);

?>


<div class="faiting">
    <div class="container">
        <div class="content-body">
            <div class="lk-container ">
                <div class="lk-menu">
                    <div class="lk-nav">
                        <ul>
                            <li class="menu-link"><a href="<?= Url::to(['tournament/view','id'=>Yii::$app->session['tournamentId']])?>"><?=Yii::t('admin','Overview')?></a></li>
                            <li class="menu-link"><a href="#">Current</a></li>
                            <li class="menu-link"><a href="<?= Url::to(['tournament/fight','tournamentId'=>Yii::$app->session['tournamentId']])?>"><?=Yii::t('admin','Fight')?></a></li>
                            <li class="menu-link"><a href="<?= Url::to(['tournament/results','tournamentId'=>Yii::$app->session['tournamentId']])?>"><?=Yii::t('admin','Results')?></a></li>
                        </ul>
                    </div>
                </div>
                <div id="error-block" class="error <?= $isHasConflict ? '' : 'hidden' ?>"><?= Yii::t('admin','Conflicted Score!')?></div>
                <div class="faiting-container">
                    <div class="faiter">
                        <div class="fainer-content">
                            <img src="/web/upload/user/<?= $user->photo ?>" alt="">
                            <div class="faiter-info">
                                <div class="name">
                                    <?= $user->username?>
                                </div>
                                <div class="rep-container">
                                    <div class="reputation">
                                        <p><?= Yii::t('admin','Reputation')?></p>
                                        <p><?= $user->reputation?></p>
                                    </div>
                                    <div class="reputation">
                                        <p>Rate</p>
                                        <p>22222</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="faiter-buttons">
                            <div class="info">
                                <?= Yii::t('admin','Choose your result')?>
                            </div>
                            <div class="buttons">
                                <a
                                    class="won"
                                    id="iWonBtn"
                                    href="#"
                                    data-user-id="<?= Yii::$app->user->id ?>"
                                    data-fight-id="<?= $fightId ?>"
                                    data-param="<?= $statusParam ?>"
                                    data-value="<?= $statuses['win'] ?>"
                                    style="color: #FFFFFF"
                                >
                                    <?= Yii::t('admin','I won')?>
                                </a>
                                <a
                                    class="lose"
                                    id="iLoseBtn"
                                    href="#"
                                    data-user-id="<?= Yii::$app->user->id ?>"
                                    data-fight-id="<?= $fightId ?>"
                                    data-param="<?= $statusParam ?>"
                                    data-value="<?= $statuses['lose'] ?>"
                                    style="color: #000000"
                                >
                                    <?= Yii::t('admin','I lose')?>
                                </a>
                                <a class="draw" href="<?= Url::to(['tournament/draw'])?>" style="color: #FFFFFF"><?= Yii::t('admin','Draw match') ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="result">
                        <div class="correct-result">Not correct result</div>
                        <div class="vs">VS</div>
                        <div class="correct-result correct-result-admin">Call admin</div>
                    </div>
                    <div class="faiter oponent">
                        <div class="fainer-content">
                            <img src="/web/upload/user/<?= (!isset($enemy->photo)) ? '?' : $enemy->photo ?>" alt="">
                            <div class="faiter-info">
                                <div class="name">
                                    <?= (!isset($enemy->username)) ? '?' : $enemy->username ?>
                                </div>
                                <div class="rep-container">
                                    <div class="reputation">
                                        <p><?= Yii::t('admin','Reputation')?></p>
                                        <p><?= (!isset($enemy->reputation)) ? '?' : $enemy->reputation ?></p>
                                    </div>
                                    <div class="reputation">
                                        <p>Rate</p>
                                        <p>22222</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="faiter-buttons">
                            <div class="info">
                                ?
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





