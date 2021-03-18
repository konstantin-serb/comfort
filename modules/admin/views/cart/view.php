<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/** @var $model app\modules\admin\models\Cart
 * @var $images \app\modules\admin\models\ImagesProduct
 * @var $image \app\modules\admin\models\ImagesProduct
 * @var $linkModel \app\modules\admin\models\forms\CreateLinkTagForm
 */

$this->registerJsFile('/js/back/addLink.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


?>
<?= Html::a('Добавить изображение', ['add-image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
<?php if($images):?>

    <h2>Изображения товара</h2>
    <div class="row">
        <?php foreach($images as $image):?>
            <div class="col-md-2">
                <a href="<?=Url::to(['image-view', 'id' => $image->id])?>">
                    <img class="image" src="<?=$image->getMini()?>">
                </a>
            </div>
        <?php endforeach;?>
    </div>
<hr>
<?php endif;?>

<span id="tags">
<?=$this->render('/cart/part/tags', [
        'cartTag' => $cartTag,
    'model' => $model,
])?>
    </span>

<?php Modal::begin([
    'header' => '<h2>Привязать тег</h2>',
    'toggleButton' => [
        'label' => 'Привязать тег',
        'tag' => 'a',
        'class' => 'btn btn-success',
    ],
]) ?>

<?php $form = ActiveForm::begin()?>

<?=$form->field($linkModel, 'tagId')->dropDownList($tagArray)?>

<div class="form-group">
    <a class="btn btn-success" id="add3" data-id="<?=$model->id?>">Добавить</a>
</div>

<?php ActiveForm::end()?>

<?php Modal::end() ?>

<?php Modal::begin([
    'header' => '<h2>Создать новый тег</h2>',
    'toggleButton' => [
        'label' => 'Создать новый тег',
        'tag' => 'a',
        'class' => 'btn btn-success',
    ],
]) ?>

<?php $form = ActiveForm::begin()?>

<?=$form->field($tagModel, 'title')->textInput()?>

<div class="form-group">
    <a class="btn btn-success" id="add4">Добавить</a>
</div>
<p id="message4"></p>
<?php ActiveForm::end()?>

<?php Modal::end() ?>
<hr>

<div class="cart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'slug',
            'title',
            'text:html',
            'description:html',
            'info:html',
            'price:html',
            'model',
//            'manufacturer',
            [
                'attribute' => 'manufacturer',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->getManufacturer();
                }
            ],
            [
                'attribute' => 'availability',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->availability == 0) {
                        return '<span class="red-color">Нет на складе</span>';
                    } else if ($model->availability == 1) {
                        return '<span class="blue-color">Есть на складе</span>';
                    }

                }
            ],
//            'subcategory_id',
            [
                'attribute' => 'subcategory_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->getSubcategory();
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return '<span class="red-color">Не видно на сайте</span>';
                    } else if ($model->status == 1) {
                        return '<span class="blue-color">Видно на сайте</span>';
                    }

                }
            ],

            [
                'attribute' => 'recommend',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->recommend == 1) {
                        return '<span class="blue-color">Рекомедовано</span>';
                    } else {
                        return '<span class="red-color">Не рекомендовано</span>';
                    }

                }
            ],
//            'time_create:datetime',
//            'time_update:datetime',
//            'user_create',
//            'user_update',
        ],
    ]) ?>

</div>
