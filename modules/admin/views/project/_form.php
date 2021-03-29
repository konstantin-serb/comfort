<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>

<!--    --><?//= $form->field($model, 'type_view')->dropDownList([
//        9 => 'Тип показа без изображения',
//        10 => 'Тип показа с изображением',
//    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
