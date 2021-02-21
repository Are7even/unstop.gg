<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fight */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tournament_id')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList(\app\helpers\FightTypeHelper::TypeList()) ?>

    <?= $form->field($model, 'first_user_id')->textInput(['maxlength' => true])->label('First player') ?>

    <?= $form->field($model, 'second_user_id')->textInput(['maxlength' => true])->label('Second player') ?>

    <?= $form->field($model, 'score_id')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'fight_order')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
