<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Carttag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carttag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cart_id')->textInput() ?>

    <?= $form->field($model, 'tag_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
