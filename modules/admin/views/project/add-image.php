<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Страница добавления изображения к статье';
?>

<h1><?=$this->title?></h1>


<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'image')->fileInput()?>

<div class="form-group">
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end()?>
