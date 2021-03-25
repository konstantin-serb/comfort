<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteTest */

$this->title = 'Update Site Test: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Site Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-test-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
