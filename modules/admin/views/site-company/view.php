<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SiteCompany */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<script type="text/javascript">
    window.onload = function () {
        let checkBox1 = document.querySelector('#check1');
        let checkBox2 = document.querySelector('#check2');
        let message1 = document.querySelector('#message1');
        let message2 = document.querySelector('#message2');
        checkBox1.onclick = function () {
            let inputChecked = 0;
            if (checkBox1.checked == 1) {
                inputChecked = 1;
            }
            if (checkBox1.checked == 0) {
                inputChecked = 0;
            }
            let value = {checked: inputChecked, check: 'image2_visible'};
            $.ajax({
                url: '/admin/site-company/check-ajax',
                method: 'post',
                data: value,
                success: function (data) {
                    if(data == true){
                        if(inputChecked==0){
                            message1.innerHTML = "Не показывать";
                        }
                        if(inputChecked==1){
                            message1.innerHTML = "Показывать";
                        }
                    }
                }

            });
        }

        checkBox2.onclick = function () {
            let inputChecked2 = 0;
            if (checkBox2.checked == 1) {
                inputChecked2 = 1;
            }
            if (checkBox2.checked == 0) {
                inputChecked2 = 0;
            }
            let value = {checked: inputChecked2, check: 'image3_visible'};
            $.ajax({
                url: '/admin/site-company/check-ajax',
                method: 'post',
                data: value,
                success: function (data) {
                    if(data == true){
                        if(inputChecked2==0){
                            message2.innerHTML = "Не показывать";
                        }
                        if(inputChecked2==1){
                            message2.innerHTML = "Показывать";
                        }
                    }
                }

            });
        }
    }
</script>
<div class="site-company-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <div class="row">
        <div class="col-md-2 image-box">
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image1'])?>">
                <?php if($model->image1):?>
                    <img src="/uploads/<?=$model->image1?>">
                <?php else:?>
                    <img src="/images/company.svg">
                <?php endif;?>
            </a>
        </div>
        <div class="col-md-2 image-box">
            <input type="checkbox" id="check1" <?php if($model->image2_visible==1){echo 'checked';}?>> <span id="message1"><?php if($model->image2_visible==1){echo 'Показывать';} else {echo 'Не показывать';}?></span>
            <br>
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image2'])?>">
                <?php if($model->image2):?>
                    <img src="/uploads/<?=$model->image2?>">
                <?php else:?>
                    <img src="/images/logo-head.svg">

                <?php endif;?>
            </a>

        </div>
        <div class="col-md-2 image-box">
            <input type="checkbox" id="check2" <?php if($model->image3_visible==1){echo 'checked';}?>> <span id="message2"><?php if($model->image3_visible==1){echo 'Показывать';} else {echo 'Не показывать';}?></span>
            <br>
            <a class="" href="<?=Url::to(['update-image', 'type'=>'image3'])?>">
                <?php if($model->image3):?>
                    <img src="/uploads/<?=$model->image3?>">
                <?php else:?>
                    <img src="/images/25.svg">
                <?php endif;?>
            </a>


        </div>

    </div>

    <hr>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title:html',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return '<span class="red-color">Не видно на сайте</span>';
                    } else if ($model->status == 1) {
                        return '<span class="blue-color">Видно на сайте</span>';
                    }

                }
            ],
            'fonts',
            'text:html',
            'text2:html',
            'text3:html',
//            'image1',
//            'image2',
        ],
    ]) ?>

</div>
