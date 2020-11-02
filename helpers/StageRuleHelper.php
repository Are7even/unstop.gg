<?php


namespace app\helpers;


use Yii;

class StageRuleHelper
{
    public static $bo1 = 0;
    public static $bo2 = 1;
    public static $bo3 = 2;
    public static $bo5 = 3;
    public static function RuleList(){
        return [
            self::$bo1=>Yii::t('admin','Best of One'),
            self::$bo2=>Yii::t('admin','Best of Two'),
            self::$bo3=>Yii::t('admin','Best of Three'),
            self::$bo5=>Yii::t('admin','Best of Five'),
        ];
    }

}