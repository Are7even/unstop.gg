<?php

namespace app\modules\v1\controllers;

use tests\RedirectTest;
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
use yii\web\ServerErrorHttpException;
use Yii;

class TournamentController extends Controller
{
    private $tournametModel;
    private $scoreModel;
    private $fightModel;
    private $userModel;
    private $intermediateScoreModel;
    private $tournamentHelper;
    public $active = false;

    public function init()
    {
        $this->tournamentHelper = new TournamentHelper();
        $this->scoreModel = new Score();
        $this->tournametModel = new Tournament();
        $this->fightModel = new Fight();
        $this->userModel = new User();
        $this->intermediateScoreModel = new IntermediateScore();
    }

    public function actionTournaments()
    {
        $tournaments = $this->tournametModel->getTournaments();
        return [
            'tournaments' => $tournaments
        ];
    }

    public function actionTournament($tournamentId)
    {
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
        $request = Yii::$app->request;
        $type = $request->getBodyParam('type');
        $type = isset($type) ? $type : 'bo1';

        if (!$this->tournamentHelper->validateFightType($type)) {
            throw new NotAcceptableHttpException('Type should be bo1, bo3, bo5 or bo7');
        }

        $tournament = $this->tournametModel->getTournament($tournamentId);
        $userList = TournamentToUser::getUserList($tournamentId);
        if (!$tournament) {
            throw new NotFoundHttpException('Tournament not found');
        }

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
                $fight = new Fight();
                $scoreId = $score->create();
                $isFightSaved = $fight->createFight($pair[0], $pair[1], $tournamentId, $key + 1, $scoreId, $type);
                if (!$isFightSaved) {
                    $tournament->allow();
                    $score->delete();
                    return ['errors' => $fight->errors];
                }
            }
            return ['pairs' => $pairs];
        } else {
            return ['errors' => $tournament->errors];
        }
    }

    public function actionBrackets($tournamentId)
    {
        $tournament = $this->tournametModel->getTournament($tournamentId);
        if (!$tournament) {
            throw new NotFoundHttpException('Tournament not found');
        }

        $size = $tournament->players_count;
        $fights = $this->fightModel->getTournamentFights($tournamentId);
        $teams = [];
        $scores = [];

        for ($i = 0; $i < $size / 2; $i++) {
            $fight = $fights[$i];
            $teams[] = $this->userModel->getUsername($fight->first_user_id);
            $teams[] = $this->userModel->getUsername($fight->second_user_id);
        }

        foreach ($fights as $fight) {
            $scores[] = $this->scoreModel->getScore($fight->score_id);
        }

        return $this->tournamentHelper->buildBracket($teams, $scores);
    }

    public function actionUpdateFightStatus($tournamentId, $fightId)
    {
        $request = Yii::$app->request;
        $fight = $this->fightModel->getFightById($fightId);
        if ($fight->status == Fight::$status['finished']) {
            throw new NotAcceptableHttpException('Fight already finished');
        }

        $firstStatus = $request->getBodyParam('firstStatus');
        if (!$firstStatus) $firstStatus = IntermediateScore::$status['unset'];

        $secondStatus = $request->getBodyParam('secondStatus');
        if (!$secondStatus) $secondStatus = IntermediateScore::$status['unset'];

        $updateStatus = $this->intermediateScoreModel->updateStatuses($fightId, $firstStatus, $secondStatus);
        if (!$updateStatus) {
            throw new BadRequestHttpException('Bad request');
        }

        $status = $this->intermediateScoreModel->getByFight($fightId);
        $score = $this->scoreModel->getScore($fight->score_id);
        $result = $this->tournamentHelper->getUpdatedResult($score, $status);
        $scoreStatus = true;
        if (!$status->active) {
            $scoreStatus = $this->scoreModel->updateScore($fight->score_id, $result[0], $result[1]);
        }

        $this->fightModel->updateFightStatus($fight->id);

        $firstUserScore = $fight->score->first_user_score;
        $secondUserScore = $fight->score->second_user_score;
        $type = $fight->type;

        if ($firstUserScore != Fight::maxGamesByBO($type) && $secondUserScore != Fight::maxGamesByBO($type)) {
            $updateActive = $this->intermediateScoreModel->updateActive($fightId);
            if (!$updateActive) {
                throw new BadRequestHttpException('Bad request(bo)');
            }
        }

        return [
            'status' => $status,
            'result' => $result,
            'scoreStatus' => $scoreStatus
        ];
    }

    public function actionUpdateScore($tournamentId, $fightId)
    {
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