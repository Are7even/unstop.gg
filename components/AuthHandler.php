<?php

namespace app\components;

use app\helpers\StatusHelper;
use app\models\Auth;
use app\models\User;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;
use Yii;

class AuthHandler
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function handle()
    {
        $attributes = $this->client->getUserAttributes();
        $idAttr = 'id';
        switch ($this->client->name) {
            case 'google':
                $emailAttr = 'emails.0.value';
                $nameAttr = 'displayName';
                break;
            default:
                $emailAttr = 'email';
                $nameAttr = 'username';
        }
        $email = ArrayHelper::getValue($attributes, $emailAttr);
        $id = ArrayHelper::getValue($attributes, $idAttr);
        $username = ArrayHelper::getValue($attributes, $nameAttr);

        /* @var Auth $auth */
        $auth = Auth::find()->where([
            'source' => $this->client->getId(),
            'source_id' => $id,
        ])->one();

        if (empty($email)) {
            Yii::$app->getSession()->setFlash('error', [
                Yii::t('admin', "User doesn't have email in {client}, please register in another way.", ['client' => $this->client->getTitle()]),
            ]);
            return false;
        }
        if (Yii::$app->user->isGuest) {
            if ($auth) { // login
                /* @var User $user */
                Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
            } else { // signup
                if ($email !== null && User::find()->where(['email' => $email])->exists()) {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('admin', "User with the same email as in {client} account already exists but isn't linked to it. Login using email first to link it.", ['client' => $this->client->getTitle()]),
                    ]);
                } else {
                    $password = Yii::$app->security->generateRandomString(12);
                    $user = new User([
                        'username' => $username,
                        'email' => $email,
                        'password' => $password,
                        'status' => StatusHelper::$active,
                    ]);
                    $user->generateAuthKey();
                    $user->generatePasswordResetToken();

                    $transaction = User::getDb()->beginTransaction();

                    if ($user->save()) {
                        $auth = new Auth([
                            'user_id' => $user->id,
                            'source' => $this->client->getId(),
                            'source_id' => (string)$id,
                        ]);
                        if ($auth->save()) {
                            $transaction->commit();
                            Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
                        } else {
                            $transaction->rollBack();
                            Yii::$app->getSession()->setFlash('error',
                                Yii::t('admin', 'Unable to save {client} account: {errors}', [
                                    'client' => $this->client->getTitle(),
                                    'errors' => json_encode($auth->getErrors()),
                                ])
                            );
                        }
                    } else {
                        $transaction->rollBack();
                        Yii::$app->getSession()->setFlash('error',
                            Yii::t('admin', 'Unable to save user: {errors}', [
                                'client' => $this->client->getTitle(),
                                'errors' => json_encode($user->getErrors()),
                            ])
                        );
                    }
                }
            }
        }

    }


}