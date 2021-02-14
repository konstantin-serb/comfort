<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategory */

$this->title = 'Добавить подкатегорию';
$this->params['breadcrumbs'][] = ['label' => 'Подкатегории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categoryArray' => $categoryArray,
    ]) ?>

</div>
