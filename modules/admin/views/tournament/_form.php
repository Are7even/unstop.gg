<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tournament */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tournament-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'game')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'hidden')->textInput() ?>

    <?= $form->field($model, 'handheld')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating_on')->textInput() ?>

    <?= $form->field($model, 'players_count')->textInput() ?>

    <?= $form->field($model, 'start')->textInput() ?>

    <?= $form->field($model, 'end')->textInput() ?>

    <?= $form->field($model, 'checkin')->textInput() ?>

    <?= $form->field($model, 'checkin_start')->textInput() ?>

    <?= $form->field($model, 'checkin_end')->textInput() ?>

    <?= $form->field($model, '1_place')->textInput() ?>

    <?= $form->field($model, '2_place')->textInput() ?>

    <?= $form->field($model, '3_place')->textInput() ?>

    <?= $form->field($model, '4_place')->textInput() ?>

    <?= $form->field($model, '5_place')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
