<?php

use app\components\StringHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'slug',
            'title',
//            'text:html',
            [
                'attribute' => 'description',
                'format' => 'raw',
                'value' => function ($article) {
                    return StringHelper::getShort($article->description, 100);
                    },
            ],
            //'image',
            //'mini',
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
            //'time_create:datetime',
            //'time_update:datetime',
            //'user_create',
            //'user_update',
//            'type_view',
            [
                'attribute' => 'type_view',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->type_view == 9) {
                        return '<span class="blue-color">Тип показа без изображения</span>';
                    } else if ($model->type_view == 10) {
                        return '<span class="green-color">Тип показа с изображением</span>';
                    }

                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
