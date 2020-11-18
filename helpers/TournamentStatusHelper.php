<?php


namespace app\helpers;


use Yii;

class TournamentStatusHelper
{
    public static $created = 0;
    public static $waiting = 1;
    public static $fighting = 2;
    public static $end = 3;
    public static function typeList(){
        return [
            self::$created=>Yii::t('admin','Created'),
            self::$waiting=>Yii::t('admin','Waiting players'),
            self::$fighting=>Yii::t('admin','Fighting'),
            self::$end=>Yii::t('admin','End'),
        ];
    }
}