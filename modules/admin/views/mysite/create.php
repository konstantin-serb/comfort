<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Mysite */

$this->title = 'Create Mysite';
$this->params['breadcrumbs'][] = ['label' => 'Mysites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
