<?php


namespace app\controllers;

use app\models\Fight;
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
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->getHeaders()->set('Content-Type', 'application/json');
        $tournament = Tournament::findOne($tournamentId);
        $userList = TournamentToUser::getUserList($tournamentId);
        if ($tournament->start()) {
            foreach ($userList as $user) {
                $playersId[] = $user->user_id;
            }
            shuffle($playersId);
           $playersId = array_chunk($playersId,2);
           foreach ($playersId as $pair){
               Fight::add($pair[0],$pair[1],$tournamentId);
           }
           return ['ids' => $playersId];
        }
    }

    public function actionApi($tournamentId){
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->getHeaders()->set('Content-Type', 'application/json');
        $tournament = Tournament::findOne($tournamentId);
        $pairs = Fight::find()->select(['first_user_id','second_user_id'])->where(['tournament_id'=>$tournamentId])->all();
        $pairs_scores = Fight::find()->select(['first_user_id_score','second_user_id_score'])->where(['tournament_id'=>$tournamentId])->all();
        $players = [];
        $results = [];
        foreach ($pairs as $pair){
            $players[] = [$pair['first_user_id'],$pair['second_user_id']];
        }
        $items = [];
        $items = [
            'teams' => $players,
            'results' => [self::createStages(self::countRegistered($tournament->id))],
        ];

        echo '<pre>';
        print_r($items);
        echo '</pre>';
        die;
        return $items;
    }



    static function createStages($playersCount){
        $stageCount = ceil(log($playersCount,2));
        while ($stageCount > 2){
            for ($i = 0 ; $i < pow(2,$stageCount)/2; $i++){
                $data[] = [1,0];
            }
            $result[] = $data;
            $stageCount -= 1;
        }
        $result[] = [[2,1],[NULL,NULL]];
        $result[] = [[NULL,NULL],[NULL,NULL]];

        return $result;
    }

    static function countRegistered($tournamentId){
        $registeredUsers = TournamentToUser::find()->select('user_id')->where(['tournament_id'=>$tournamentId])->all();
        $count = count($registeredUsers);
        return $count;
    }


    public function actionView($id)
    {
        $tournament = Tournament::findOne($id);
        return $this->render('view', [
            'tournament' => $tournament,
        ]);
    }


    public function actionRegistration($tournamentId)
    {
        $registration = new TournamentToUser();
        $registration->add(Yii::$app->user->id, $tournamentId);

        return $this->goBack(['tournament/view', 'id' => $tournamentId]);
    }

    public function actionFight($tournamentId,$userId)
    {
        return $this->render('fight');
    }

    public function actionResults($tournamentId,$userId)
    {
        return $this->render('results');
    }


}