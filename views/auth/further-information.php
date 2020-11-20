<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $furtherInformation app\models\FurtherInformationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php echo Yii::t('admin','fill out the following fields to end registration')?>:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'further-information-form',
        'layout' => 'horizontal',
        'action' => 'auth/further-information',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($furtherInformation, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($furtherInformation, 'email')->textInput() ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Register now', ['class' => 'btn btn-primary', 'name' => 'further-information-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


