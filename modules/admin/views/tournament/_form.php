<?php

use app\helpers\StatusHelper;
use app\models\Games;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Tournament */
/* @var $form yii\widgets\ActiveForm */

$languages = \app\models\Language::findActive();
?>

<div class="tournament-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'icon')->widget(MediaManagerInput::className(), [
        'multiple' => true,

        'clientOptions' => [
            'api' => [
                'listUrl' => Url::to(['/mm/api/list']),
                'uploadUrl' => Url::to(['/mm/api/upload']),
                'downloadUrl' => Url::to(['/mm/api/download']),
            ],
        ],
    ]);
    ?>

    <?= $form->field($model, 'game')->dropDownList(ArrayHelper::map(Games::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'created_at')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'hidden')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'handheld')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating_on')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'players_count')->textInput() ?>

    <?php echo $form->field($model, 'start')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'end')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'checkin')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'checkin_start')->textInput() ?>

    <?= $form->field($model, 'checkin_end')->textInput() ?>

    <?= $form->field($model, 'first_place')->textInput() ?>

    <?= $form->field($model, 'second_place')->textInput() ?>

    <?= $form->field($model, 'third_place')->textInput() ?>

    <?= $form->field($model, 'fourth_place')->textInput() ?>

    <?= $form->field($model, 'fifth_place')->textInput() ?>

    <div class="tabs">
        <?php $count = 0; ?>
        <ul class="tabs__caption">
            <?php foreach ($languages as $language): ?>
                <li class="<?php if ($count === 0) echo "active"; ?>"><?php echo $language->title ?></li>
                <?php $count++; ?>
            <?php endforeach; ?>
        </ul>
        <?php $count = 0; ?>

        <?php foreach ($languages as $language): ?>
            <div class="tabs__content <?php if ($count === 0) echo "active"; ?>">
                <?php echo $form->field($model->translate($language->code), "[$language->code]header")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]short_text")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]text")->textarea(['id'=>'textarea']); ?>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
