<?php

namespace app\helpers;
use Yii;

class StatusHelper {
    public static $active = 1;
    public static $draft = 0;
    public static function statusList(){
        return [
            self::$active=>Yii::t('admin','Active'),
            self::$draft=>Yii::t('admin','Draft'),
        ];
    }
}