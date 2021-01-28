<?php

namespace app\modules\v1\helpers;

use app\models\IntermediateScore;
use Yii;

class TournamentHelper
{
    static public $types = [
        'bo1' => 1,
        'bo3' => 3,
        'bo5' => 5,
        'bo7' => 7
    ];

    private function normalizeTeams($teams)
    {
        $teams = array_chunk($teams, 2);
        return array_values($teams);
    }

    private function getFightsResults($scores, $size)
    {
        $results = [];
        $iters = 0;
        $scores = array_values($scores);
        $scoresCount = count($scores);

        for ($i = 0; $iters < $scoresCount; $i++) {
            $size /= 2;
            $results[] = [];
            for ($j = 0; $j < $size && $iters < $scoresCount; $j++) {
                $results[$i][] = [
                    $scores[$iters]['first_user_score'],
                    $scores[$iters]['second_user_score']
                ];
                $iters++;
            }
        }

        return $results;
    }

    public function validateFightType($value)
    {
        return array_key_exists($value, self::$types);
    }

    public function getPairs($players)
    {
        $ids = [];
        foreach ($players as $player) {
            $ids[] = $player->user_id;
        }
        shuffle($ids);
        $pairs = array_chunk($ids, 2);
        return $pairs;
    }

    public function buildBracket($teams, $scores)
    {
        $size = count($teams);
        $teams = $this->normalizeTeams($teams);
        $results = $this->getFightsResults($scores, $size);
        
        return [
            'teams' => $teams,
            'results' => $results
        ];
    }

    public function getUpdatedResult($score, $status)
    {
        $first = $score->first_user_score;
        $second = $score->second_user_score;

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

        return [$first, $second];
    }
}