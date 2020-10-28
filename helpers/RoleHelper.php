<?php
namespace app\helpers;
use yii;

class RoleHelper
{

<<<<<<< HEAD
    public static $creator = 10;
    public static $admin = 7;
    public static $moder = 6;
    public static $redactor = 5;
    public static $steward = 4;
    public static $premium = 3;
    public static $true_user = 2;
    public static $user = 1;
    public static $guest = 0;
    public static $banned = 9;
=======
    public static $creator = 'creator';
    public static $admin = 'admin';
    public static $moder = 'moder';
    public static $redactor = 'redactor';
    public static $steward = 'steward';
    public static $premium = 'premium';
    public static $true_user = 'true_user';
    public static $user = 'user';
    public static $guest = 'guest';
    public static $banned = 'banned';
>>>>>>> origin/Oleg

    static function roleList(){
        return [
            self::$creator=>Yii::t('admin','Creator'),
            self::$admin=>Yii::t('admin','Admin'),
            self::$moder=>Yii::t('admin','Moderator'),
            self::$redactor=>Yii::t('admin','Redactor'),
            self::$steward=>Yii::t('admin','Steward'),
            self::$premium=>Yii::t('admin','Premium'),
            self::$true_user=>Yii::t('admin','True user'),
            self::$user=>Yii::t('admin','User'),
            self::$guest=>Yii::t('admin','Guest'),
            self::$banned=>Yii::t('admin','Banned'),
        ];
    }

}