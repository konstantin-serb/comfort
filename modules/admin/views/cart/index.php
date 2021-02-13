<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slug',
            'title',
            'text:ntext',
            'description:ntext',
            //'info:ntext',
            //'model',
            //'manufacturer',
            //'availability',
            //'subcategory_id',
            //'status',
            //'time_create:datetime',
            //'time_update:datetime',
            //'user_create',
            //'user_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
