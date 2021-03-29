<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SiteTest */
/* @var $tech app\models\TechInfo */
/* @var $item app\models\TechInfo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="site-test-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if ($tech): ?>
        <hr>
        <h3>Загруженные файлы:</h3>
        <div class="filesWrap">
            <?php foreach($tech as $item):?>
            <div class="uploadFiles">
                <a href="<?=\yii\helpers\Url::to(['update-file', 'id' => $item->id])?>" <?php
                if($item->status == 0){
                    echo 'style="color:#BEBEBE;"';
                }
                ?>>
                <?=$item->title. ' ('.$item->format.') '.$item->size?>
                </a> &nbsp; &nbsp;
                <?= Html::a('&#215;', ['delete-file', 'id' => $item->id], [
                    'class' => 'deleteBut',
                    'style' => 'font-size:1.5em;',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <?php endforeach;?>
        </div>
        <hr>
    <?php endif; ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Загрузить файл', ['add-file'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
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
            'fonts',
            'text:html',
        ],
    ]) ?>

</div>
