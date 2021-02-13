<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Site', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tel_kyiv',
            'tel_voda',
            'tel_life',
            'address',
            //'email:email',
            //'fb',
            //'insta',
            //'in',
            //'title_main',
            //'title_main2',
            //'title_about',
            //'image_main',
            //'image_about',
            //'mini_about',
            //'text_main:ntext',
            //'text_about1:ntext',
            //'text_about2:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
