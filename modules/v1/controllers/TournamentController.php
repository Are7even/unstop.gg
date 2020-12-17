<?php

namespace app\modules\v1\controllers;

use yii\rest\Controller;
use yii\base\Event;
use app\models\TournamentToUser;
use app\models\Tournament;
use app\models\Fight;
use app\models\Score;
use app\models\User;
use app\modules\v1\helpers\TournamentHelper;
use app\helpers\TournamentStatusHelper;
use yii\web\NotFoundHttpException;
use yii\web\NotAcceptableHttpException;
use Yii;

class TournamentController extends Controller
{
    private $tournametModel;
    private $scoreModel;
    private $fightModel;
    private $userModel;
    private $tournamentHelper;

    public function init() {
        $this->tournamentHelper = new TournamentHelper();
        $this->scoreModel = new Score();
        $this->tournametModel = new Tournament();
        $this->fightModel = new Fight();
        $this->userModel = new User();
    }

    public function actionTournaments() {
        $tournaments = $this->tournametModel->getTournaments();
        return [
            'tournaments' => $tournaments
        ];
    }

    public function actionTournament($tournamentId) {
        $tournament = $this->tournametModel->getTournament($tournamentId);
        if (!$tournament) {
            throw new NotFoundHttpException('Tournament not found');
        }

        return [
            'tournament' => $tournament
        ];
    }

    public function actionFights($tournamentId) {
        return [];
    }

    public function actionScore($tournamentId, $fightId) {
        return [
            'id' => $tournamentId,
            'fightId' => $fightId
        ];
    }

    public function actionStart($tournamentId)
    {
        $tournament = Tournament::findOne($tournamentId);
        $userList = TournamentToUser::getUserList($tournamentId);
        if ($tournament->status !== TournamentStatusHelper::$waiting) {
            throw new NotAcceptableHttpException('Tournament already started');
        }

        if ($tournament->players_count !== count($userList)) {
            throw new NotAcceptableHttpException('Wrong players number');
        }

        if ($tournament->start()) {
            $pairs = $this->tournamentHelper->getPairs($userList);
            foreach ($pairs as $key => $pair) {
                $score = new Score();
                $scoreId = $score->create();
                $type = 'bo1';
                Fight::add($pair[0], $pair[1], $tournamentId, $key + 1, $scoreId, $type);
            }
            return ['pairs' => $pairs];
        }
    }

    public function actionBrackets($tournamentId)
    {
        $fights = $this->fightModel->getTournamentFights($tournamentId);
        $teams = [];
        $scores = [];
        foreach ($fights as $fight) {
            $teams[] = $this->userModel->getUsername($fight->first_user_id);
            $teams[] = $this->userModel->getUsername($fight->second_user_id);
            $scores[] = $this->scoreModel->getScore($fight->score_id);
        }
        return $this->tournamentHelper->buildBracket($teams, $scores);
    }

    public function actionCreateFight($tournamentId) {
        return [];
    }

    public function actionUpdateScore($tournamentId, $fightId) {
        return [];
    }
}