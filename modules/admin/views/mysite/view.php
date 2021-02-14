<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Mysite */

$this->title = 'Редактирование основного контента сайта';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mysite-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
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
//            'image_main',
//            'image_about',
//            'mini_about',
            'text_main:html',
            'text_about1:html',
            'text_about2:html',
        ],
    ]) ?>

</div>
