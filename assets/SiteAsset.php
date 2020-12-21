<?php


namespace app\assets;
use yii\web\AssetBundle;

class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '';
    public $css = [
        'site/css/style.css',
        'css/custom.css',
        'site/assets/jquery.bracket.min.css',
        'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap',
        'https://pro.fontawesome.com/releases/v5.10.0/css/all.css',
        'https://unpkg.com/swiper/swiper-bundle.css',
        'https://unpkg.com/swiper/swiper-bundle.min.css',
    ];
    public $js = [
       // 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
        'site/js/config.js',
        'https://unpkg.com/swiper/swiper-bundle.min.js',
        'site/assets/swiper.min.js',
        'site/assets/jquery.bracket.min.js',
        'site/assets/jquery.nicescroll.min.js',
        'site/js/script.js',
        'js/custom.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}