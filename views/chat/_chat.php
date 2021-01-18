<?php
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<?php Pjax::begin([
    'id' => 'list-messages',
    'enablePushState' => false,
    'linkSelector' => false,
    'formSelector' => false,
]) ?>
<div class="osnova" id="osnova">
<?= $this->render('_list-users', [
    'usersList' => $usersList,
]) ?>


<?= $this->render('_list', [
    'messagesQuery' => $messagesQuery,
]) ?>
</div>


<?php Pjax::end() ?>


