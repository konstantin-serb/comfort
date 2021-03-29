<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SiteNews */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="site-news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Все новости', ['/admin/news'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить новость', ['/admin/news/create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return '<span class="red-color">Не видно на сайте</span>';
                    } else if ($model->status == 1) {
                        return '<span class="blue-color">Видно на сайте</span>';
                    }

                }
            ],
            'fonts',
        ],
    ]) ?>

</div>
