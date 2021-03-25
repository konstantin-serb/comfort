<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteDesigners */

$this->title = 'Create Site Designers';
$this->params['breadcrumbs'][] = ['label' => 'Site Designers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-designers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>