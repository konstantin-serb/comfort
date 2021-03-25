<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteMain */

$this->title = 'Create Site Main';
$this->params['breadcrumbs'][] = ['label' => 'Site Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-main-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
