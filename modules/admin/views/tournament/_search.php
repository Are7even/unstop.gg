<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TournamentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tournament-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'icon') ?>

    <?= $form->field($model, 'game') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'hidden') ?>

    <?php // echo $form->field($model, 'handheld') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'rating_on') ?>

    <?php // echo $form->field($model, 'players_count') ?>

    <?php // echo $form->field($model, 'start') ?>

    <?php // echo $form->field($model, 'end') ?>

    <?php // echo $form->field($model, 'checkin') ?>

    <?php // echo $form->field($model, 'checkin_start') ?>

    <?php // echo $form->field($model, 'checkin_end') ?>

    <?php // echo $form->field($model, 'first_place') ?>

    <?php // echo $form->field($model, 'second_place') ?>

    <?php // echo $form->field($model, 'third_place') ?>

    <?php // echo $form->field($model, 'fourth_place') ?>

    <?php // echo $form->field($model, 'fifth_place') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('admin', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
