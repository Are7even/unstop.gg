<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>



<?php echo $this->render('_chat', [
    'message' => $message,
    'messagesQuery' => $messagesQuery,
    'usersList' => $usersList,
]); ?>

<div id="scrollTo"></div>

<?php $form = ActiveForm::begin(['options' => ['class' => 'pjax-form']]) ?>
<div class="type_msg">
    <div class="input_msg_write">
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

<?php

$script = <<< JS
var input = document.getElementById('message-text');
var scroll = document.getElementById('scrollTo');
$(document).on('beforeSubmit', '#w1', function () {
        var _this = $(this);

        $.ajax({
            url: _this.attr('action'),
            data: _this.serialize(),
            type: 'POST',
            dataType: 'html',
            success: function (response) {
                                     input.value = '';
                     setTimeout(()=>scroll.scrollIntoView(),1000)
               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.info(textStatus + ' ' + errorThrown);
            }
        });

        return false;
    });

function updateList() {
      $.pjax.reload({container : '#osnova'})
    }
    setInterval(updateList, 1000);
JS;

$this->registerJs($script);


?>



