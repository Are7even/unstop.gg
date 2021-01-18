<?php


namespace app\assets;

use yii\web\AssetBundle;

class ChatAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '';
    public $css = [
        'site/css/style.css',
        'css/custom.css',
        'https://pro.fontawesome.com/releases/v5.10.0/css/all.css',
    ];
    public $js = [
       // 'js/custom.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}