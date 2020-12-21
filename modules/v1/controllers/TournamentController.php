<?php

namespace app\modules\v1\controllers;

use yii\rest\Controller;
use yii\base\Event;
use app\models\TournamentToUser;
use app\models\Tournament;
use app\models\Fight;
use app\models\Score;
use app\models\User;
use app\models\IntermediateScore;
use app\modules\v1\helpers\TournamentHelper;
use app\helpers\TournamentStatusHelper;
use yii\web\NotFoundHttpException;
use yii\web\NotAcceptableHttpException;
use yii\web\BadRequestHttpException;
use Yii;

class TournamentController extends Controller
{
    private $tournametModel;
    private $scoreModel;
    private $fightModel;
    private $userModel;
    private $intermediateScoreModel;
    private $tournamentHelper;

    public function init() {
        $this->tournamentHelper = new TournamentHelper();
        $this->scoreModel = new Score();
        $this->tournametModel = new Tournament();
        $this->fightModel = new Fight();
        $this->userModel = new User();
        $this->intermediateScoreModel = new IntermediateScore();
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

    public function actionUpdateFightStatus($tournamentId, $fightId) {
        try {
            $request = Yii::$app->request;
            $fight = $this->fightModel->getFightById($fightId);
            if ($fight->status == Fight::$status['finished']) {
                throw new NotAcceptableHttpException('Fight already finished');
            }

            $firstStatus = $request->getBodyParam('firstStatus');
            if (!$firstStatus) $firstStatus = 0;

            $secondStatus = $request->getBodyParam('secondStatus');
            if (!$secondStatus) $secondStatus = 0;

            $updateStatus = $this->intermediateScoreModel->updateStatuses($fightId, $firstStatus, $secondStatus);
            if (!$updateStatus) {
                throw new BadRequestHttpException('Bad request');
            }

            $status = $this->intermediateScoreModel->getByFight($fightId);
            if (!$status->active) {
                $score = $this->scoreModel->getScore($fight->score_id);
                $first = $score->first_user_score || 0;
                $second = $score->second_user_score || 0;

                if (
                    $status->first_user_id_status == IntermediateScore::$status['win'] &&
                    $status->second_user_id_status == IntermediateScore::$status['lose']
                ) {
                    $first += 1;
                } elseif (
                    $status->second_user_id_status == IntermediateScore::$status['win'] &&
                    $status->first_user_id_status == IntermediateScore::$status['lose']
                ) {
                    $second += 1;
                }

                $scoreStatus = $this->scoreModel->updateScore($fight->score_id, $first, $second);
                if ($scoreStatus) {
                    $this->fightModel->updateFightStatus($fight->id);
                }
            }

            return [
                'status' => $status
            ];
        } catch(Exception $e) {
            return [
                'error' => $e
            ];
        }
    }

    public function actionUpdateScore($tournamentId, $fightId) {
        $request = Yii::$app->request;
        $fight = $this->fightModel->getFightById($fightId);
        if ($fight->status == Fight::$status['finished']) {
            throw new NotAcceptableHttpException('Fight already finished');
        }

        $first = $request->getBodyParam('first');
        $second = $request->getBodyParam('second');
        $this->scoreModel->updateScore($fight->score_id, $first, $second);
        $score = $this->scoreModel->getScore($fight->score_id);

        return [
            'score' => $score
        ];
    }
}