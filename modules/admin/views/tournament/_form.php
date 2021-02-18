<?php

use app\helpers\StatusHelper;
use app\models\Games;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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

    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'author')->hiddenInput()->label(false)  ?>

    <?= $form->field($model, 'created_at')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'hidden')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'handheld')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'type')->dropDownList(\app\helpers\TournamentTypeHelper::typeList()) ?>

    <?= $form->field($model, 'rating_on')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'players_count')->textInput() ?>

    <?php echo $form->field($model, 'start')->widget(DateTimePicker::classname(), [
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


    <?php echo $form->field($model, 'checkin')->radioList(StatusHelper::statusList()) ?>

    <?php echo $form->field($model, 'checkin_start')->widget(DateTimePicker::classname(), [
        'pickerButton' => ['icon' => 'time'],
        'pluginOptions' => [
            'autoclose' => true,
            'format'=>'yyyy-mm-dd hh:ii',
        ]
    ]); ?>

    <?php echo $form->field($model, 'checkin_end')->widget(DateTimePicker::classname(), [
        'pickerButton' => ['icon' => 'time'],
        'pluginOptions' => [
            'autoclose' => true,
            'format'=>'yyyy-mm-dd hh:ii',
        ]
    ]); ?>

    <?= $form->field($model, 'first_place')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'second_place')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'third_place')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'fourth_place')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'fifth_place')->hiddenInput()->label(false) ?>


        <?php $count = 0; ?>
        <ul class="nav nav-pills nav-justified" data-role="st-tabnav" role="tablist">
            <?php foreach ($languages as $language): ?>
                <li class="nav-item waves-effect waves-light <?php if ($count === 0) echo "active"; ?>">
                    <a class="nav-link" data-st-tab="city-form" href="<?php echo '#tab-'.$count ?>"><?php echo $language->title ?></a>
                </li>
                <?php $count++; ?>
            <?php endforeach; ?>
        </ul>
        <?php $count = 0; ?>


        <div class="tab-content" data-role="city-form">
            <?php foreach ($languages as $language): ?>
                <div id="<?php echo 'tab-'.$count ?>" class="tab-pane <?php if ($count === 0) echo "active"; ?>">
                    <div class="p-3 " role="tabpanel">
                        <?php echo $form->field($model->translate($language->code), "[$language->code]header")->textInput(); ?>
                        <?php echo $form->field($model->translate($language->code), "[$language->code]short_text")->textInput(); ?>
                        <?php echo $form->field($model->translate($language->code), "[$language->code]text")->textarea(['id'=>'textarea']); ?>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>




    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
