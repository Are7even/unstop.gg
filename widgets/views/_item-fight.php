<?php

use app\models\User;

?>

<div class="match-tournament">
        <div class="table-content">
            <img src="/web/upload/user/<?= User::findById($model->first_user_id)->photo?>" alt="">
            <div class="table">
                <div class="table-title">
                    <?=Yii::t('admin','Username')?>
                </div>
                <div class="table-text">
                    <?= User::findById($model->first_user_id)->username?>
                </div>
            </div>
            <div class="table">
                <div class="table-title">
                    <?=Yii::t('admin','Point')?>
                </div>
                <div class="table-text">
                    <?= $model->score->first_user_score?>
                </div>
            </div>
        </div>

        <div class="table-content">
            <img src="/web/upload/user/<?= User::findById($model->second_user_id)->photo?>" alt="">
            <div class="table">
                <div class="table-title">
                    <?=Yii::t('admin','Username')?>
                </div>
                <div class="table-text">
                    <?= User::findById($model->second_user_id)->username?>
                </div>
            </div>
            <div class="table">
                <div class="table-title">
                    <?=Yii::t('admin','Point')?>
                </div>
                <div class="table-text">
                    <?= $model->score->second_user_score?>
                </div>
            </div>
        </div>
    </div>


