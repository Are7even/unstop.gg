<?php

use app\models\Genre;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$languages = \app\models\Language::findActive();

/* @var $this yii\web\View */
/* @var $model app\models\Games */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="games-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'image')->widget(MediaManagerInput::className(), [
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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genre_id')->dropDownList(
            ArrayHelper::map(Genre::find()->all(),'id','title')
    ) ?>

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
                <?php echo $form->field($model->translate($language->code), "[$language->code]description")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]keywords")->textInput(); ?>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
