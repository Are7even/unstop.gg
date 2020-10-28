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
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css',
        'admin/css/bootstrap.min.css' ,
        'admin/css/icons.css' ,
        'admin/css/style.css' ,
        'admin/css/custom.css' ,
    ];
    public $js = [


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yiiui\yii2materialdesignicons\MaterialDesignIconsAsset',
    ];
}
