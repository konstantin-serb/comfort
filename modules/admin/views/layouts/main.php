<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'На сайт',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Админпанель',
                'url' => ['/admin'],

            ],
            [
                'label' => 'Сайт',
                // 'url' => ['/admin/mysite/view', 'id' => 1],
                'items' => [
                    ['label' => 'Основноей контент сайта', 'url' => ['/admin/mysite/view', 'id' => 1]],
                    ['label' => 'Статьи', 'url' => ['/admin/article']],

                ],

            ],
            [
                'label' => 'Товары',
                'items' => [
                    ['label' => 'Товары', 'url' => ['/admin/cart']],
                    ['label' => 'Категории', 'url' => ['/admin/category']],
                    ['label' => 'Подкатегории', 'url' => ['/admin/subcategory']],
                    ['label' => 'Теги', 'url' => ['/admin/producttag']],
                    ['label' => 'Техническая информация', 'url' => ['/admin/techinfo']],


                ],
            ],
            [
                'label' => 'Статьи',
                'items' => [
                    ['label' => 'Новости', 'url' => ['/admin/news']],
                    ['label' => 'Проекты', 'url' => ['/admin/project']],
                ],
            ],

            [
                'label' => 'Users',
                'items' => [
                    ['label' => 'Управление пользователями', 'url' => ['/admin/user']],
                    ['label' => 'Изменить пароль', 'url' => ['/admin/user/change-password']],
                ],
            ],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Главная ',
                'url' => Url::to(['/admin']),
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Comfort heat <?= date('Y') ?></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
