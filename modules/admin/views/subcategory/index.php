<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SubcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подкатегории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать подкатегорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'slug',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->getCategoryName();
                }
            ],
            'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
