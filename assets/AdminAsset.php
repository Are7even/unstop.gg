<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\admin;

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
    public $baseUrl = '@web';
    public $css = [
        'admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css',
        'admin/css/bootstrap.min.css' ,
        'admin/css/icons.css' ,
        'admin/css/style.css' ,
    ];
    public $js = [
        'admin/js/jquery.min.js',
        'admin/js/popper.min.js',
        'admin/js/bootstrap.min.js',
        'admin/js/modernizr.min.js',
        'admin/js/detect.js',
        'admin/js/fastclick.js',
        'admin/js/jquery.slimscroll.js',
        'admin/js/jquery.blockUI.js',
        'admin/js/waves.js',
        'admin/js/jquery.nicescroll.js',
        'admin/js/jquery.scrollTo.min.js',
        'admin/plugins/flot-chart/jquery.flot.min.js',
        'admin/plugins/flot-chart/jquery.flot.time.js',
        'admin/plugins/flot-chart/curvedLines.js',
        'admin/plugins/flot-chart/jquery.flot.pie.js',
        'admin/plugins/morris/morris.min.js',
        'admin/plugins/raphael/raphael-min.js',
        'admin/plugins/jquery-sparkline/jquery.sparkline.min.js',
        'admin/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
        'admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'admin/pages/crypto-dash.init.js',
        'admin/js/app.js',
    ];
    public $depends = [
    ];
}
