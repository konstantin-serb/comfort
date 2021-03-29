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

    <h1>Главная страница сайта</h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Site Main', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
    <div class="row">
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image_main'])?>">
                <?php if($model->image_main):?>
                <img src="<?=$model->getImage('image_main')?>">
                <?php else:?>
                    <img src="/images/hero.svg">
                <?php endif;?>
            </a>
        </div>
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image2'])?>">
                <?php if($model->image2):?>
                <img src="<?=$model->getImage('image2')?>">
                <?php else:?>
                    <img src="/images/img.svg">
                <?php endif;?>
            </a>
        </div>
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image3'])?>">
                <?php if($model->image3):?>
                <img src="<?=$model->getImage('image3')?>">
                <?php else:?>
                    <img src="/images/25.svg">
                <?php endif;?>
            </a>
        </div>
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image_map'])?>">
                <?php if($model->image_map):?>
                <img src="<?=$model->getImage('image_map')?>">
                <?php else:?>
                    <img src="/images/map.svg">
                <?php endif;?>
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
