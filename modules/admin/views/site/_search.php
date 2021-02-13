<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tel_kyiv') ?>

    <?= $form->field($model, 'tel_voda') ?>

    <?= $form->field($model, 'tel_life') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'fb') ?>

    <?php // echo $form->field($model, 'insta') ?>

    <?php // echo $form->field($model, 'in') ?>

    <?php // echo $form->field($model, 'title_main') ?>

    <?php // echo $form->field($model, 'title_main2') ?>

    <?php // echo $form->field($model, 'title_about') ?>

    <?php // echo $form->field($model, 'image_main') ?>

    <?php // echo $form->field($model, 'image_about') ?>

    <?php // echo $form->field($model, 'mini_about') ?>

    <?php // echo $form->field($model, 'text_main') ?>

    <?php // echo $form->field($model, 'text_about1') ?>

    <?php // echo $form->field($model, 'text_about2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
