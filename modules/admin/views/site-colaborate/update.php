<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteColaborate */

$this->title = 'Update Site Colaborate: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Site Colaborates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-colaborate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
