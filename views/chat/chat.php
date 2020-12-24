<?php
use yii\widgets\Pjax;
?>

<?php Pjax::begin([
   'timeout'=>3000,
   'enablePushState'=>false,
   'linkSelector'=>false,
   'formSelector'=>'.pjax-form',
]);?>
<?php echo $this->render('_chat',[
    'message'=>$message,
    'messagesQuery'=>$messagesQuery,
    'usersList'=>$usersList,
]);?>
<?php Pjax::end()?>

<?php
$script = <<< JS
function updateList() {
      $.pjax.reload({container : '#list-messages'});
    }
    setInterval(updateList, 1000);
JS;

?>

