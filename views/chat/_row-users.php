<?php
/**
 * Created by PhpStorm.
 * User: медведь
 * Date: 02.12.2017
 * Time: 22:11
 */

use app\models\Message;
use yii\helpers\Url;

?>

<div class="people_list">
<a href="<?= \yii\helpers\Url::to(['chat/chat', 'id' => $model->id]) ?>">
    <div class="chat_people chat_list active_chat">
        <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
        <div class="chat_ib">
            <h5><?= $model->username ?>
                <span
                        class="chat_date"><?= Message::findLastMessage(Yii::$app->user->id, $model->id)->created_at ?>
                </span>
            </h5>
            <p>
                <?= Message::findLastMessage(Yii::$app->user->id, $model->id)->text ?>
            </p>
        </div>
    </div>
</a>
<a class="delete_chat" href="<?= \yii\helpers\Url::to(['chat/delete', 'receiverId' => $model->id]) ?>">
    <i class="fa fa-times"></i>
</a>
</div>