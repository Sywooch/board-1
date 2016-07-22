<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic',
        'css/fotorama.css',
        'css/libs.min.css',
        'css/style.min.css',
        'css/owl.carousel.css',
        'sass/styles.css',

    ];
    public $js = [
        /*'js/jquery-2.1.3.min.js',*/
        'js/bootstrap.min.js',
        'js/fotorama.js',
        'js/owl.carousel.min.js',
        'js/script.min.js',
        'js/general.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
