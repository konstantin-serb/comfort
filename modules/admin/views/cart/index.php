<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use app\components\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Url;


?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'slug',
            'title',
//            'text:ntext',
//            'description:ntext',
            [
                'attribute' => 'description',
                'format' => 'raw',
                'value' => function ($article) {
                    return StringHelper::getShort($article->description, 100);


                },
            ],
            //'info:ntext',
            //'model',
            //'manufacturer',

//            [
//                'attribute' => 'availability',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    if ($model->availability == 0) {
//                        return '<span class="red-color">Нет на складе</span>';
//                    } else if ($model->availability == 1) {
//                        return '<span class="blue-color">Есть на складе</span>';
//                    }
//
//                }
//            ],
            //'subcategory_id',
//            'status',
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
            'recommend',

            //'time_create:datetime',
            //'time_update:datetime',
            //'user_create',
            //'user_update',

            [
                /**
                 * Указываем класс колонки ActionColumn
                 */
                'class' => \yii\grid\ActionColumn::class,

                /**
                 * Определяем набор кнопок. По умолчанию {view} {update} {delete}
                 */
                'template' => '{view} {update} {delete}',

                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $iconName = "eye-open";

                        //Текст в title ссылки, что виден при наведении
                        $title = \Yii::t('yii', 'Вид');

                        $id = 'info-' . $key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $model->slug
                        ];

                        $url = Url::current(['view', 'id' => $model->slug]);

                        //Для стилизации используем библиотеку иконок
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);


                        return Html::a($icon, $url, $options);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
