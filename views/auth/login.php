<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $login app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

    <?php $form = ActiveForm::begin([
        'id' => 'login',
        'layout' => 'horizontal',
        'action' => '/',
        'options'=>['class' => 'login-form validate-form'],
    ]); ?>
    <span class="form-title"><?php echo Yii::t('admin', 'Login') ?></span>

    <?= $form->field($login, 'formId')->hiddenInput([
        'value'=>'login-form',
        'name'=>'formId'
    ])->label(false)?>

    <?= $form->field($login, 'email')->textInput([
        'class' => 'input100',
        'placeholder' => 'email',
        'type' => 'text',
        'name' => 'email',
    ])->label(false) ?>

    <?= $form->field($login, 'password')->passwordInput([
        'class' => 'input100',
        'placeholder' => 'password',
        'type' => 'password',
        'name' => 'password',
    ])->label(false) ?>

    <?= $form->field($login, 'rememberMe')->checkbox([
        'style' => 'display:none',
    ])->label(false) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>



        <?= yii\authclient\widgets\AuthChoice::widget([
            'baseAuthUrl' => ['auth/auth'],
            'popupMode' => false,
            'options' => [
                'class' => 'social',
            ], // for div holder
        ]) ?>

    <div class="col-mb-4">
        <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
        <script type="text/javascript">
            VK.init({apiId: 7649532});
        </script>

        <!-- VK Widget -->
        <div id="vk_auth"></div>
        <script type="text/javascript">
            VK.Widgets.Auth("vk_auth", {"authUrl": "/auth/login-vk"});
        </script>
    </div>

    <div class="text-center">
        <a href="#" class="txt1" id="recovery_login_href"><?php echo Yii::t('admin','Forgot your password?')?></a>
        <a href="#" class="txt1" id="register_login_href"><?php echo Yii::t('admin',"Don't have an account? Register")?></a>
    </div>
    <?php ActiveForm::end(); ?>

