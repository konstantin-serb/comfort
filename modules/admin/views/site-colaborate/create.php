<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteColaborate */

$this->title = 'Create Site Colaborate';
$this->params['breadcrumbs'][] = ['label' => 'Site Colaborates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-colaborate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
