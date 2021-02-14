<?php
/**
 * @var $cat \app\modules\admin\models\Category
 * @var $model \app\modules\admin\models\forms\UpdateCategoryForm
 */
use yii\helpers\Html;


$this->title = 'Изменить категорию: ' . $cat->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $cat->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить категорию';

$model->order = $cat->order;
$model->title = $cat->title;
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update_form', [
        'model' => $model,
    ]) ?>

</div>
