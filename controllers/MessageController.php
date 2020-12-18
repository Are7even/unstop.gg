<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Conversation;
use app\models\Message;
use bubasuma\simplechat\controllers\ControllerTrait;


class MessageController extends Controller
{
    use ControllerTrait;

    /**
     * @return string
     */
    public function getMessageClass()
    {
        return Message::className();
    }

    /**
     * @return string
     */
    public function getConversationClass()
    {
        return Conversation::className();
    }
}