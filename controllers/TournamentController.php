<?php


namespace app\controllers;

use app\models\Games;
use app\models\Tournament;
use app\models\TournamentToUser;
use yii\web\Response;
use yii\web\Controller;
use Yii;


class TournamentController extends Controller
{

    public function actionIndex()
    {
        $games = Games::find()->all();


        return $this->render('index', ['games' => $games,]);
    }

    public function actionStart($tournamentId)
    {
        $tournament = Tournament::findOne($tournamentId);
        if ($tournament->start()) {
            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;
            $response->getHeaders()->set('Content-Type', 'application/json');

            $userList = TournamentToUser::getUserList($tournamentId);
            foreach ($userList as $user) {
                $playersId[] = $user->user_id;
            }
            $items = [];
            $items = [
                'teams' => [
                    $playersId,
                ],
                'results' => [
                    [['result1', 'result2']],
                ],
            ];
            return $items;
        }
    }

    public function actionView($id)
    {
        $tournament = Tournament::findOne($id);
        return $this->render('view', [
            'tournament' => $tournament,
        ]);
    }

    public function actionTournament($tournamentId)
    {

    }

    public function actionRegistration($userId, $tournamentId)
    {
        $registration = new TournamentToUser();
        $registration->add($userId, $tournamentId);


        return $this->goBack(['tournament/view', 'id' => $tournamentId]);
    }
}