<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Mysite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mysite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tel_kyiv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_voda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_life')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'insta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'in')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_main')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_main2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_about')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'image_main')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'image_about')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'mini_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_main')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text_about1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text_about2')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
