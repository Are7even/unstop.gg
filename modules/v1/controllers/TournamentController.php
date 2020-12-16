<?php

namespace app\modules\v1\controllers;

use yii\rest\Controller;
use yii\base\Event;
use app\models\Tournament;
use yii\web\NotFoundHttpException;
use Yii;

class TournamentController extends Controller
{
    private $tournametModel;

    public function init() {
        $this->tournametModel = new Tournament();
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

    public function actionCreateTournament() {
        return [];
    }

    public function actionCreateFight($tournamentId) {
        return [];
    }

    public function actionUpdateScore($tournamentId, $fightId) {
        return [];
    }
}