<?php
use yii\widgets\Pjax;
\app\assets\SiteAsset::register($this);
?>
<style><?php include(Yii::getAlias('@app/web/site/css/style.css'));?></style>
<style><?php include(Yii::getAlias('@app/web/css/custom.css'));?></style>


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

