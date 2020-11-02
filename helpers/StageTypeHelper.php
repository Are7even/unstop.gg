<?php


namespace app\helpers;


use Yii;

class StageTypeHelper
{
    public static $double = 1;
    public static $single = 0;
    public static function StageList(){
        return [
            self::$single=>Yii::t('admin','Single elimination'),
            self::$double=>Yii::t('admin','Double elimination'),
        ];
    }
}