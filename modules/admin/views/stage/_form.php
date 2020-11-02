<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Stage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tournament_id')->dropDownList(ArrayHelper::map(\app\models\Tournament::find()->all(),'id','header')) ?>

    <?= $form->field($model, 'type')->dropDownList(\app\helpers\StageTypeHelper::StageList()); ?>

    <?= $form->field($model, 'rule')->dropDownList(\app\helpers\StageRuleHelper::RuleList()) ?>

    <?= $form->field($model, 'start')->widget(DateTimePicker::classname(), [
        'pickerButton' => ['icon' => 'time'],
        'pluginOptions' => [
            'autoclose' => true,
            'format'=>'yyyy-mm-dd hh:ii',
        ]
    ]); ?>

    <?= $form->field($model, 'end')->widget(DateTimePicker::classname(), [
        'pickerButton' => ['icon' => 'time'],
        'pluginOptions' => [
            'autoclose' => true,
            'format'=>'yyyy-mm-dd hh:ii',
        ]
    ]); ?>

    <?= $form->field($model, 'players_count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
