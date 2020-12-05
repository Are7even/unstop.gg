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
                            <li class="menu-link"><a href="<?= Url::to(['tournament/view','id'=>$tournament->id])?>"><?=Yii::t('admin','Overview')?></a></li>
                            <li class="menu-link"><a href="#">Current</a></li>
                            <li class="menu-link"><a href="<?= Url::to(['tournament/fight','tournamentId'=>$tournament->id,'userId'=>Yii::$app->user->id])?>"><?=Yii::t('admin','Fight')?></a></li>
                            <li class="menu-link"><a href="<?= Url::to(['tournament/results','tournamentId'=>$tournament->id,'userId'=>Yii::$app->user->id])?>"><?=Yii::t('admin','Results')?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="faiting-container faiting-result">
                    <div class="faiter">
                        <div class="fainer-content">
                            <img src="/web/site/img/lk-image.png" alt="">
                            <div class="faiter-info">
                                <div class="name">
                                    JasonStathem
                                </div>
                                <div class="rep-container">
                                    <div class="reputation">
                                        <p>Reputation</p>
                                        <p>300</p>
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
                        <div class="status">Winner</div>
                        <div class="vinner-name">JasonStathem</div>
                        <div class="vs">1 - 0</div>
                    </div>
                    <div class="faiter oponent">
                        <div class="fainer-content">
                            <img src="/web/site/img/lk-image.png" alt="">
                            <div class="faiter-info">
                                <div class="name">
                                    JasonStathem
                                </div>
                                <div class="rep-container">
                                    <div class="reputation">
                                        <p>Reputation</p>
                                        <p>300</p>
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





