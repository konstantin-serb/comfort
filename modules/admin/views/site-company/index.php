<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Site Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Site Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'status',
            'fonts',
            'text:ntext',
            //'text2:ntext',
            //'text3:ntext',
            //'image1',
            //'image2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
