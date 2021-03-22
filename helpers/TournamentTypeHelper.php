<?php


namespace app\helpers;


use Yii;

class TournamentTypeHelper
{
    public static $group = 1;
    public static $solo = 0;
    public static function typeList(){
        return [
            self::$group=>Yii::t('admin','Group'),
            self::$solo=>Yii::t('admin','Individual'),
        ];
    }
}