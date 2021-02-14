<?php
/**
 * @var $modelMan \app\modules\admin\models\forms\CreatManufacturerForm
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\bootstrap\Modal;
use app\modules\admin\models\Cart;

$this->registerJsFile('/js/back/addManufacturer.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

$this->registerJsFile('/js/back/addSubcategory.js', [
    'depends' => \yii\web\JqueryAsset::class,
]);

?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

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
        ],
    ]);
    ?>




    <?php
    echo $form->field($model, 'info')->widget(Widget::className(), [
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
        ],
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <div class="inputPlus">
    <?= $form->field($model, 'manufacturer')->dropDownList($manufacArray) ?>
        <div class="buttonPlus">

            <?php Modal::begin([
                'header' => '<h2>Добавить производителя</h2>',
                'toggleButton' => [
                    'label' => '+',
                    'tag' => 'a',
                    'class' => 'buttonAdd bnt btn-success',
                    ],
            ])?>

            <div class="form-group field-createcartform-model">
                <label class="control-label" for="createcartform-model">Производитель</label>
                <input type="text" id="creatmanufacturerform-manufactured" class="form-control" name="CreateCartForm[model]" maxlength="255">

            </div>
            <p id="message1"></p>

            <div class="form-group">
                <a class="btn btn-success" id="add1">Добавить</a>
<!--                --><?//= Html::a('Добавить', ['class' => 'btn btn-success', 'id'=>'add1']) ?>
            </div>


            <?php Modal::end()?>
        </div>
    </div>

    <?= $form->field($model, 'availability')->dropDownList([
            Cart::AVAILABILITY => 'Есть на складе',
            Cart::NOT_AVAILABILITY => 'Нет на складе',
    ]) ?>

<!--    --><?//=printer($array2)?>

    <div class="inputPlus">
        <?= $form->field($model, 'subcategory_id')->dropDownList($subCatArray); ?>
        <div class="buttonPlus">

            <?php Modal::begin([
                'header' => '<h2>Добавить подкатегорию</h2>',
                'toggleButton' => [
                    'label' => '+',
                    'tag' => 'a',
                    'class' => 'buttonAdd bnt btn-success',
                ],
            ]) ?>

            <div class="form-group field-createcartform-model">
                <label class="control-label" for="createcartform-model">Категория</label>
                <br>
                <select id="cat" class="form-control">
                    <?=$option?>
                </select>
                <br>
                <label class="control-label" for="createcartform-model">Подкатегория</label>
                <input type="text" id="addSubCat" class="form-control"
                       name="CreateCartForm[model]" maxlength="255">

            </div>
            <p id="message2"></p>

            <div class="form-group">
                <a class="btn btn-success" id="add2">Добавить</a>
            </div>


            <?php Modal::end() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
