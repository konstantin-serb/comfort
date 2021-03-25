<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Страница добавления файла</h1>


<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'file')->fileInput()?>

<div class="form-group">
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end()?>
