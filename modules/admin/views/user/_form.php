<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\helpers\RoleHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

<<<<<<< HEAD
    <?= $form->field($model, 'auth_key')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
=======
    <?= $form->field($model, 'token')->textInput() ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
>>>>>>> origin/Oleg

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<<<<<<< HEAD
    <?= $form->field($model, 'password_reset_token')->passwordInput(['maxlength' => true]) ?>

=======
>>>>>>> origin/Oleg
    <?= $form->field($model, 'role')->dropDownList(RoleHelper::roleList()) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
