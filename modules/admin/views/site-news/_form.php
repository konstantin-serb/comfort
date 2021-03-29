<?php

use app\models\Article;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiteNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        Article::STATUS_VISIBLE => 'Видно на сайте',
        Article::STATUS_INVISIBLE => 'Не видно на сайте',
    ]) ?>

    <?= $form->field($model, 'fonts')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
