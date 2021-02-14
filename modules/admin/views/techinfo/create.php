<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TechInfo */

$this->title = 'Create Tech Info';
$this->params['breadcrumbs'][] = ['label' => 'Tech Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tech-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
