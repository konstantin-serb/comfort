<?php
/**
 *@var $model \app\modules\admin\models\News
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Изображение к статье: '.$model->title;
?>
<div>
<h1><?=$this->title?></h1>
    <a href="javascript:history.back()" class="btn btn-default">Назад</a>
    <br><br>

<div class="row">
    <div class="col-md-6">
        <img class="image" src="<?=$model->getMini()?>">
        <br>
        <?= Html::a('Удалить', ['delete-image', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Хотите удалить это изображение?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="javascript:history.back()" class="btn btn-default">Назад</a>
        <br>

    </div>
</div>
</div>

