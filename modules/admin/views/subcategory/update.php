<?php
/**
 * @var $subCat \app\modules\admin\models\Subcategory
 * @var $model \app\modules\admin\models\forms\UpdateSubcategoryForm
 */

use yii\helpers\Html;

$this->title = 'Редактировать: ' . $subCat->title;
$this->params['breadcrumbs'][] = ['label' => 'Подкатегории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $subCat->title, 'url' => ['view', 'id' => $subCat->id]];
$this->params['breadcrumbs'][] = 'Изменить';

$model->title = $subCat->title;
$model->description = $subCat->description;
$model->order = $subCat->order;
$model->categoryId = $subCat->category_id;
?>
<div class="subcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
        'categoryArray' => $categoryArray,
    ]) ?>

</div>
