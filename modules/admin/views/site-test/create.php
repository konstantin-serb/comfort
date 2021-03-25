<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteTest */

$this->title = 'Create Site Test';
$this->params['breadcrumbs'][] = ['label' => 'Site Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
