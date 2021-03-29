<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Site Designers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-designers-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Site Designers', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'status',
            'fonts',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
