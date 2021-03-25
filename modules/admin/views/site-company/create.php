<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteCompany */

$this->title = 'Create Site Company';
$this->params['breadcrumbs'][] = ['label' => 'Site Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
