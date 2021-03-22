<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>



<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'photo')->fileInput(['maxlength'=>true]) ?>

<?= \yii\helpers\Html::submitButton(Yii::t('admin','Submit'),['class'=>'login100-form-btn'])?>

<?php ActiveForm::end() ?>
