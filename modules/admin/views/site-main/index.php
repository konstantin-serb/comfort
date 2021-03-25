<?php
/**
 * @var $model \app\models\SiteMain
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Site Mains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-main-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Site Main', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
    <div class="row">
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image_main'])?>">
                <img src="<?=$model->getImage('image_main')?>">
            </a>
        </div>
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image2'])?>">
                <img src="<?=$model->getImage('image2')?>">
            </a>
        </div>
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image3'])?>">
                <img src="<?=$model->getImage('image3')?>">
            </a>
        </div>
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image_map'])?>">
                <img src="<?=$model->getImage('image_map')?>">
            </a>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'title2',
//            'text:ntext',
//            'image_main',
            //'image2',
            //'image3',
            //'image_map',
            //'tel1',
            //'tel2',
            //'tel3',
            'email:email',
            'address',
            //'fb1',
            //'fb2',
            //'fb3',
            'fonts',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
