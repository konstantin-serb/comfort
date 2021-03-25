<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteService */

$this->title = 'Update Site Service: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Site Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
