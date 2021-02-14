<?php
/**
 *@var $image \app\modules\admin\models\ImagesProduct
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Страница просмотра изображения';
?>

<h1><?php $this->title?></h1>

<div class="row">
    <div class="col-md-6">
        <img class="image" src="<?=$image->getImage()?>">
        <?= Html::a('Удалить', ['delete-image', 'id' => $image->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <br>

        <?php $form = ActiveForm::begin()?>

        <?=$form->field($model, 'sort')->textInput()?>

        <div class="form-group">
            <?= Html::submitButton('Применить изменения', ['class' => 'btn btn-success']) ?>
            <a href="javascript: history.back();" class="btn btn-default">Назад</a>
        </div>

        <?php ActiveForm::end()?>
    </div>
</div>

