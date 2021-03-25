<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteTech */

$this->title = 'Update Site Tech: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Site Teches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-tech-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
