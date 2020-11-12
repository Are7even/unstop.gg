<?php

use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Advertisement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->widget(MediaManagerInput::className(), [
        'multiple' => true,

        'clientOptions' => [
            'api' => [
                'listUrl' => Url::to(['/mm/api/list']),
                'uploadUrl' => Url::to(['/mm/api/upload']),
                'downloadUrl' => Url::to(['/mm/api/download']),
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
