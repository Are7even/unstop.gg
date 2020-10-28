<?php

use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$languages = \app\models\Language::findActive();

/* @var $this yii\web\View */
/* @var $model app\models\Gifts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gifts-form">

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


    <div class="tabs">
        <?php $count = 0; ?>
        <ul class="nav nav-pills nav-justified" data-role="st-tabnav" role="tablist">
            <?php foreach ($languages as $language): ?>
                <li class="nav-item waves-effect waves-light <?php if ($count === 0) echo "active"; ?>">
                    <a class="nav-link" data-st-tab="city-form"
                       href="<?php echo '#tab-' . $count ?>"><?php echo $language->title ?></a>
                </li>
                <?php $count++; ?>
            <?php endforeach; ?>
        </ul>
        <?php $count = 0; ?>

        <div class="tab-content" data-role="city-form">
            <?php foreach ($languages as $language): ?>
                <div id="<?php echo 'tab-' . $count ?>" class="tab-pane <?php if ($count === 0) echo "active"; ?>">
                    <div class="p-3 " role="tabpanel">
                        <?php echo $form->field($model->translate($language->code), "[$language->code]title")->textInput(); ?>
                        <?php echo $form->field($model->translate($language->code), "[$language->code]description")->textInput(); ?>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
