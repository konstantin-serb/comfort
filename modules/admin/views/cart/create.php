<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Cart */

$this->title = 'Добавить товар';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelMan' => $modelMan,
        'manufacArray' => $manufacArray,
        'subCatArray' => $subCatArray,
        'option' => $option,
    ]) ?>

</div>
