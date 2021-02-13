<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Carttag */

$this->title = 'Create Carttag';
$this->params['breadcrumbs'][] = ['label' => 'Carttags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carttag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
