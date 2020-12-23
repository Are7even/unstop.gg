<?php
/**
 * Created by PhpStorm.
 * User: медведь
 * Date: 02.12.2017
 * Time: 22:11
 */
?>

<div class="incoming_msg">
    <div class="received_msg">
        <div class="received_withd_msg">
            <h1><?= $model->sender->username ?></h1>
            <p><?= $model->text ?></p>
            <span class="time_date"> <?= $model->created_at ?></span></div>
    </div>
</div>

<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-3"> --><?//= $model->sender->username ?><!-- </div>-->
<!--        <div class="col-md-9"> --><?//= $model->text ?><!--</div>-->
<!--        <div class="col-md-9"> --><?//= $model->created_at ?><!--</div>-->
<!--    </div>-->
<!--</div>-->