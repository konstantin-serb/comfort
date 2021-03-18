<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\models\forms\UpdateCartForm */
/* @var $cart app\modules\admin\models\Cart */

$this->title = 'Редактирование товара: ' . $cart->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $cart->title, 'url' => ['view', 'id' => $cart->slug]];
$this->params['breadcrumbs'][] = 'Редактирование товара';

$model->title = $cart->title;
$model->description = $cart->description;
$model->text = $cart->text;
$model->info = $cart->info;
$model->model = $cart->model;
$model->manufacturer = $cart->manufacturer;
$model->availability = $cart->availability;
$model->subcategory_id = $cart->subcategory_id;
$model->status = $cart->status;
$model->price = $cart->price;
$model->recommend = $cart->recommend;

?>
<div class="cart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update_form', [
        'model' => $model,
        'manufacArray' => $manufacArray,
        'subCatArray' => $subCatArray,
        'option' => $option,
    ]) ?>

</div>
