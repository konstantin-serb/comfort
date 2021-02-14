<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Mysite */

$this->title = 'Редактирование основного контента сайта';

$this->params['breadcrumbs'][] = 'Редактирование основного контента сайта';
?>
<div class="mysite-update">
    <div>
        <a class="btn btn-default" href="javascript:history.back();">Отмена</a>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
