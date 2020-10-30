<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '';
    public $css = [
        'admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css',
        'admin/assets/css/bootstrap.min.css' ,
        'admin/assets/css/icons.css' ,
        'admin/assets/css/style.css' ,
        'admin/assets/css/custom.css' ,
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',
    ];
    public $js = [
//        'admin/assets/js/jquery.min.js',
        'admin/assets/js/popper.min.js',
        'admin/assets/js/bootstrap.min.js',
        'admin/assets/js/modernizr.min.js',
        'admin/assets/js/detect.js',
        'admin/assets/js/tabs.js',
        'admin/assets/js/fastclick.js',
        'admin/assets/js/jquery.slimscroll.js',
        'admin/assets/js/jquery.blockUI.js',
        'admin/assets/js/waves.js',
        'admin/assets/js/jquery.nicescroll.js',
        'admin/assets/js/jquery.scrollTo.min.js',
        'admin/assets/plugins/flot-chart/jquery.flot.min.js',
        'admin/assets/plugins/flot-chart/jquery.flot.time.js',
        'admin/assets/plugins/flot-chart/curvedLines.js',
        'admin/assets/plugins/flot-chart/jquery.flot.pie.js',
        'admin/assets/plugins/morris/morris.min.js',
        'admin/assets/plugins/raphael/raphael-min.js',
        'admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
        'admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
        'admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'admin/assets/js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yiiui\yii2materialdesignicons\MaterialDesignIconsAsset',
    ];
}
