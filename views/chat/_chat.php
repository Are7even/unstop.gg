<?php
use app\assets\SiteAsset;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>
<style><?php include(Yii::getAlias('@app/web/site/css/style.css'));?></style>
<style><?php include(Yii::getAlias('@app/web/css/custom.css'));?></style>
<?php Pjax::begin([
    'id' => 'list-messages',
    'enablePushState' => false,
    'linkSelector' => false,
    'formSelector' => false,
]) ?>

<?= $this->render('_list', [
    'messagesQuery' => $messagesQuery,
]) ?>
<?php Pjax::end() ?>

<?php $form = ActiveForm::begin(['options' => ['class' => 'pjax-form']]) ?>
<div class="type_msg">
    <div class="input_msg_write">
        <? //= yii\bootstrap\Html::activeTextarea($message,'text',[
        //    'class'=>'write_msg',
        //    'placeholder' => Yii::t('admin','Type a message'),
        //]) ?>
        <?= $form->field($message, 'text')->textInput([
            'class' => 'write_msg',
            'placeholder' => Yii::t('admin', 'Type a message'),
        ])->label(false) ?>
        <?= yii\helpers\Html::submitButton('<i class="fal fa-paper-plane" aria-hidden="true"></i>', [
            'class' => 'msg_send_btn',
        ]) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

