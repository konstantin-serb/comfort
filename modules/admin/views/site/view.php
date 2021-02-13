<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Site */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="site-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tel_kyiv',
            'tel_voda',
            'tel_life',
            'address',
            'email:email',
            'fb',
            'insta',
            'in',
            'title_main',
            'title_main2',
            'title_about',
            'image_main',
            'image_about',
            'mini_about',
            'text_main:ntext',
            'text_about1:ntext',
            'text_about2:ntext',
        ],
    ]) ?>

</div>
