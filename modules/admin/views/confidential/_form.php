<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Confidential */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="confidential-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6, 'id' => 'textarea']) ?>

    <?= $form->field($model, 'status')->dropDownList(\app\helpers\StatusHelper::statusList()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
