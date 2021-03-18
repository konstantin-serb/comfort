<?php

// error_reporting(-1);
// date_default_timezone_set('Europe/Kiev');
// mb_internal_encoding('UTF-8');
// ini_set('display_errors', false);
// ini_set('log_errors', true);
// ini_set('error_log', __DIR__ . '/../runtime/logs/app.log');
// define('YII_DEBUG', getenv('SERVER_INSTANCE_ID') <> '');

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/bootstrap.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
