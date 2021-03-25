<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteService */

$this->title = 'Create Site Service';
$this->params['breadcrumbs'][] = ['label' => 'Site Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
