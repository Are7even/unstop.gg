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
                            <li class="menu-link"><a href="<?= Url::to(['tournament/view','id'=>Yii::$app->session['tournamentId']])?>"><?=Yii::t('admin','Overview')?></a></li>
                            <li class="menu-link"><a href="#">Current</a></li>
                            <li class="menu-link"><a href="<?= Url::to(['tournament/fight','tournamentId'=>Yii::$app->session['tournamentId']])?>"><?=Yii::t('admin','Fight')?></a></li>
                            <li class="menu-link"><a href="<?= Url::to(['tournament/results','tournamentId'=>Yii::$app->session['tournamentId']])?>"><?=Yii::t('admin','Results')?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="faiting-container faiting-result">
                    <div class="faiter">
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
                    </div>
                    <div class="result">
<!--                        <div class="status">--><?//= Yii::t('admin','Winner')?><!--</div>-->
<!--                        <div class="vinner-name">JasonStathem</div>-->
                        <?php if (Yii::$app->user->id != $fight->first_user_id):?>
                        <div class="vs"><?= $fight->score->second_user_score ?> - <?= $fight->score->first_user_score ?></div>
                        <?php else:?>
                        <div class="vs"><?= $fight->score->first_user_score ?> - <?= $fight->score->second_user_score ?></div>
                        <?php endif;?>
                    </div>
                    <div class="faiter oponent">
                        <div class="fainer-content">
                            <img src="/web/upload/user/<?= $enemy->photo ?>" alt="">
                            <div class="faiter-info">
                                <div class="name">
                                    <?= $enemy->username?>
                                </div>
                                <div class="rep-container">
                                    <div class="reputation">
                                        <p><?= Yii::t('admin','Reputation')?></p>
                                        <p><?= $enemy->reputation?></p>
                                    </div>
                                    <div class="reputation">
                                        <p>Rate</p>
                                        <p>22222</p>
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





