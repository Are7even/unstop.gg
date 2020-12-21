<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $furtherInformation app\models\FurtherInformationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('admin','Further information');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="further-information container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php echo Yii::t('admin','fill out the following fields to end registration')?>:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'further-information-form',
        'layout' => 'horizontal',
        'action' => \yii\helpers\Url::to(['auth/further-information']),
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($furtherInformation, 'username')->textInput(['autofocus' => true,'placeholder'=>'username'])->label(false) ?>

    <?= $form->field($furtherInformation, 'email')->textInput(['placeholder'=>'email'])->label(false) ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Register now', ['class' => 'btn btn-primary ftr-info', 'name' => 'further-information-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


