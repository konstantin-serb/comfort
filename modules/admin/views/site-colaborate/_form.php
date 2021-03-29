<?php

use app\models\Article;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiteColaborate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-colaborate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        Article::STATUS_VISIBLE => 'Видно на сайте',
        Article::STATUS_INVISIBLE => 'Не видно на сайте',
    ]) ?>

    <?php
    echo $form->field($model, 'description')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
//            'imageUpload' => Url::to(['save-image']),
//            'imageManagerJson' => Url::to(['/default/images-get']),
//            'plugins' => [
//                'imagemanager',
//            ],
        ],
    ]);
    ?>

    <?php
    echo $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
            'imageUpload' => Url::to(['save-image']),
            'imageManagerJson' => Url::to(['/default/images-get']),
            'plugins' => [
                'imagemanager',
            ],
        ],
    ]);
    ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
