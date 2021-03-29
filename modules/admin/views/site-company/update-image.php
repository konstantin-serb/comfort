<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>Страница добавления изображений</h1>

<div class="row">
    <div class="col-md-3">
        <h3>Текущее изображение</h3>
        <?php if($currentPhoto):?>
        <img src="<?= '/uploads/' . $currentPhoto ?>">
        <?php else:?>
        <p>По умолчанию</p>
        <?php endif;?>
    </div>
</div>
<hr>
<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'image')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end() ?>
<?php if($currentPhoto):?>
<p>
    <?= Html::a('Delete', ['delete-image', 'type' => $type], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>

</p>
<?php endif;?>