<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Site Teches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-tech-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Site Tech', ['create'], ['class' => 'btn btn-success']) ?>
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
