<?php


namespace app\helpers;


use Yii;

class FightTypeHelper
{
    public static $bo1 = 'bo1';
    public static $bo3 = 'bo3';
    public static $bo5 = 'bo5';
    public static $bo7 = 'bo7';
    public static function TypeList(){
        return [
            self::$bo1=>Yii::t('admin','Best of One'),
            self::$bo3=>Yii::t('admin','Best of Three'),
            self::$bo5=>Yii::t('admin','Best of Five'),
            self::$bo7=>Yii::t('admin','Best of Seven'),
        ];
    }

}