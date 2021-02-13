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
class AppComfortAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'owl/owl.carousel.min.css',
        'owl/owl.theme.default.min.css',
        'css/styles.css',
        'css/article-styles.css',
        'css/company-styles.css',
        'css/designers-styles.css',
        'css/news-styles.css',
        'css/project-styles.css',
        'css/projects-styles.css',
        'css/search-styles.css',
        'css/service-styles.css',
        'css/techinfo-styles.css',
        'css/catalog-styles.css',
        'css/catalog-cart-styles.css',
        'css/media.css',

        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
