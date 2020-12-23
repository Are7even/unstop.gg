<?php


namespace app\controllers;

use app\controllers\CustomController;
use app\models\Message;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ChatController extends Controller
{

    public function init()
    {
        parent::init();
        $this->layout = false;
    }

    public function actionIndex()
    {
        $messagesUser = Message::find()
            ->where(['sender_id' => Yii::$app->user->id])
            ->orWhere(['receiver_id' => Yii::$app->user->id])
            ->groupBy('receiver_id')
            ->all();
        $arrayUser = [];
        foreach ($messagesUser as $user) {
            if ($user->sender_id != Yii::$app->user->id) {
                $arrayUser[] = $user->sender_id;
            }
            if ($user->receiver_id != Yii::$app->user->id) {
                $arrayUser[] = $user->receiver_id;
            }
        }

        $arrayUser = array_unique($arrayUser);
        $users = User::find()
            ->where(['id' => $arrayUser])
            ->all();

        return $this->render('list', compact('users'));
    }

    public function actionChat($id)
    {
        $currentUserId = Yii::$app->user->id;
        $messagesQuery = Message::findMessages($currentUserId, $id);

        $message = new Message([
            'sender_id' => $currentUserId,
            'receiver_id' => $id,
        ]);

        if ($message->load(Yii::$app->request->post())) {
            if ($message->validate()) {
                $message->save();
                $message = new Message([
                    'sender_id' => $currentUserId,
                    'receiver_id' => $id
                ]);
                if (Yii::$app->request->isPjax) {
                    return $this->renderAjax('_chat',[
                        'message'=>$message,
                        'messagesQuery'=>$messagesQuery,
                    ]);
                }
            }
        }
        if (Yii::$app->request->isPjax) {
            return $this->renderAjax('_list', [
                'message'=>$message,
                'messagesQuery'=>$messagesQuery,
            ]);
        }

        return $this->render('chat', [
            'message'=>$message,
            'messagesQuery'=>$messagesQuery,
            'chatId'=>$id,
        ]);
    }


}