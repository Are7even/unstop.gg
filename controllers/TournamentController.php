<?php


namespace app\controllers;

use app\models\Fight;
use app\models\Games;
use app\models\Tournament;
use app\models\TournamentToUser;
use app\models\User;
use app\models\UserGameRating;
use app\models\IntermediateScore;
use yii\db\Exception;
use yii\web\Response;
use yii\web\Controller;
use yii\web\Session;
use Yii;


class TournamentController extends Controller
{

    public function actionIndex()
    {
        $games = Games::find()->all();
        return $this->render('index', ['games' => $games,]);
    }

    public function actionApi($tournamentId)
    {
        $headers = Yii::$app->response->headers;
        $headers->add('Access-Control-Allow-Origin', '*');
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->getHeaders()->set('Content-Type', 'application/json');
        $items = $this->createBrackets($tournamentId);
        return $items;
    }

    private function createBrackets($tournamentId)
    {
        $tournament = Tournament::findOne($tournamentId);
        $pairs = Fight::find()->select(['first_user_id', 'second_user_id'])->where(['tournament_id' => $tournamentId])->all();
        $players = [];
        foreach ($pairs as $pair) {
            $players[] = [User::getUsername($pair['first_user_id']), User::getUsername($pair['second_user_id'])];
        }
        $items = [
            'teams' => $players,
            'results' => [self::createStages(self::countRegistered($tournament->id))],
        ];
        return $items;
    }

    private function updateBrackets($tournamentId, $fightId)
    {
        $items = $this->createBrackets($tournamentId);
        $fight = Fight::find()->where(['id' => $fightId])->one();
    }

    static function createStages($playersCount)
    {
        $stageCount = ceil(log($playersCount, 2));
        while ($stageCount > 2) {
            for ($i = 0; $i < pow(2, $stageCount) / 2; $i++) {
                $data[] = [NULL, NULL];
            }
            $result[] = $data;
            $stageCount -= 1;
        }
        $result[] = [[NULL, NULL], [NULL, NULL]];
        $result[] = [[NULL, NULL], [NULL, NULL]];

        return $result;
    }

    static function countRegistered($tournamentId)
    {
        $registeredUsers = TournamentToUser::find()->select('user_id')->where(['tournament_id' => $tournamentId])->all();
        $count = count($registeredUsers);
        return $count;
    }

    public function actionView($id)
    {
        $session = Yii::$app->session;
        $tournament = Tournament::findOne($id);
        $session['tournamentId'] = $tournament->id;
        return $this->render('view', [
            'tournament' => $tournament,
        ]);
    }


    public function actionRegistration($tournamentId)
    {
        if (!Yii::$app->user->isGuest) {
            $tournament = Tournament::findOne($tournamentId);
            if (Tournament::maxPlayersCheck($tournamentId,$tournament->players_count)){
                $registration = new TournamentToUser();
                $registration->add(Yii::$app->user->id, $tournamentId);
                if (!UserGameRating::find()->where(['user_id' => Yii::$app->user->id])->andWhere(['games_id' => $tournament->game])->one()) {
                    UserGameRating::addRating(Yii::$app->user->id, $tournament->game);
                }
                return $this->goBack(['tournament/view', 'id' => $tournamentId]);
            }
            Yii::$app->session->setFlash('maxPlayers', Yii::t('admin', 'The maximum number of players has been reached!'));
            return $this->goBack(['tournament/view', 'id' => $tournamentId]);
        }
        return $this->goBack(['tournament/view', 'id' => $tournamentId]);
    }

    public function actionDeletePlayer($userId,$tournamentId){
        $model = new TournamentToUser();
        $tournament = Tournament::findOne($tournamentId);
        if ($tournament->author==Yii::$app->user->id) {
            if ($model->deleteFromTournament($userId, $tournamentId)) {
                return $this->goBack(['tournament/view', 'id' => $tournamentId]);
            }
            return new Exception("Something problem with DataBase");
        }
        return new Exception("You are not ".Yii::t('admin','Author'));
    }

     public function actionFight($tournamentId)
     {
         if (!Yii::$app->user->isGuest) {
             $fight = $this->findFight($tournamentId);
             if (isset($fight)) {
                 $fightingUser = Fight::getFightingUser();
                 $statusModel = new IntermediateScore();
                 $status = $statusModel->getByFight($fight->id) ?? $statusModel;
                 if ($fight->first_user_id == $fightingUser->id) {
                     $enemy = Fight::getEnemy($fight->second_user_id);
                     return $this->render('fight', [
                         'status' => $status,
                         'fightId' => $fight->id,
                         'statuses' => IntermediateScore::$status,
                         'statusParam' => 'firstStatus',
                         'user' => $fightingUser,
                         'enemy' => $enemy,
                     ]);
                 } elseif ($fight->second_user_id == $fightingUser->id) {
                     $enemy = Fight::getEnemy($fight->first_user_id);
                     return $this->render('fight', [
                         'status' => $status,
                         'fightId' => $fight->id,
                         'statuses' => IntermediateScore::$status,
                         'statusParam' => 'secondStatus',
                         'user' => $fightingUser,
                         'enemy' => $enemy,
                     ]);
                 }
             }
             return $this->goBack(['tournament/view', 'id' => $tournamentId]);
         }
         return $this->goBack(['tournament/view', 'id' => $tournamentId]);
     }

    private function findFight($tournamentId)
    {
        if ($fight = Fight::find()
            ->where(['first_user_id' => Yii::$app->user->id])
            ->andWhere(['tournament_id' => $tournamentId])
            ->andWhere(['!=', 'status', Fight::$status['finished']])
            ->one()) {

            return $fight;
        } elseif ($fight = Fight::find()
            ->where(['second_user_id' => Yii::$app->user->id])
            ->andWhere(['tournament_id' => $tournamentId])
            ->andWhere(['!=', 'status', Fight::$status['finished']])
            ->one()) {

            return $fight;
        }
    }

    public function actionResults($tournamentId)
    {
        if (!Yii::$app->user->isGuest) {
            $fight = $this->findFight($tournamentId);
            $fightingUser = Fight::getFightingUser();
            if ($fight->first_user_id == $fightingUser->id) {
                $enemy = Fight::getEnemy($fight->second_user_id);
                return $this->render('results', [
                    'user' => $fightingUser,
                    'enemy' => $enemy,
                    'fight' => $fight,
                ]);
            } elseif ($fight->second_user_id == $fightingUser->id) {
                $enemy = Fight::getEnemy($fight->first_user_id);
                return $this->render('results', [
                    'user' => $fightingUser,
                    'enemy' => $enemy,
                    'fight' => $fight,
                ]);
            }
            return $this->render('results');
        }
        return $this->goBack(['tournament/view', 'id' => $tournamentId]);
    }

}