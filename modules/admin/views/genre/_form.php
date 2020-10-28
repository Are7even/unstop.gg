<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$languages = \app\models\Language::findActive();

/* @var $this yii\web\View */
/* @var $model app\models\Genre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="genre-form">

    <?php $form = ActiveForm::begin(); ?>

<<<<<<< HEAD
    <?= $form->field($model, 'status')->dropDownList(\app\helpers\StatusHelper::statusList()) ?>


    <div class="tabs">
        <?php $count = 0; ?>
        <ul class="nav nav-pills nav-justified" data-role="st-tabnav" role="tablist">
            <?php foreach ($languages as $language): ?>
                <li class="nav-item waves-effect waves-light <?php if ($count === 0) echo "active"; ?>">
                    <a class="nav-link" data-st-tab="city-form"
                       href="<?php echo '#tab-' . $count ?>"><?php echo $language->title ?></a>
                </li>
=======
    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="tabs">
        <?php $count = 0; ?>
        <ul class="tabs__caption">
            <?php foreach ($languages as $language): ?>
                <li class="<?php if ($count === 0) echo "active"; ?>"><?php echo $language->title ?></li>
>>>>>>> origin/Oleg
                <?php $count++; ?>
            <?php endforeach; ?>
        </ul>
        <?php $count = 0; ?>

<<<<<<< HEAD
        <div class="tab-content" data-role="city-form">
            <?php foreach ($languages as $language): ?>
                <div id="<?php echo 'tab-' . $count ?>" class="tab-pane <?php if ($count === 0) echo "active"; ?>">
                    <div class="p-3 " role="tabpanel">
                        <?php echo $form->field($model->translate($language->code), "[$language->code]title")->textInput(); ?>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>
=======
        <?php foreach ($languages as $language): ?>
            <div class="tabs__content <?php if ($count === 0) echo "active"; ?>">
                <?php echo $form->field($model->translate($language->code), "[$language->code]title")->textInput(); ?>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
>>>>>>> origin/Oleg
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
