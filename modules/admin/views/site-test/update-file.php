<?php

use app\models\Article;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TechInfo */
/* @var $tech app\modules\admin\models\TechInfo */

$this->title = 'Редактирование имени файла';

$model->title = $tech->title;
$model->status = $tech->status;
?>
<h1>Редактировать название и видимость файла</h1>
<div class="site-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'status')->dropDownList([
        Article::STATUS_VISIBLE => 'Видно на сайте',
        Article::STATUS_INVISIBLE => 'Не видно на сайте',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
