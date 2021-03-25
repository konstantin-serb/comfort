<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteTech */

$this->title = 'Create Site Tech';
$this->params['breadcrumbs'][] = ['label' => 'Site Teches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-tech-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
