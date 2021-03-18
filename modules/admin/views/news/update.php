<?php


use yii\helpers\Html;

$this->title = 'Редактирование статьи: ' . $news->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $news->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование статьи';

$model->title = $news->title;
$model->text = $news->text;
$model->description = $news->description;
$model->type_view = $news->type_view;
$model->status = $news->status;
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update_form', [
        'model' => $model,
        'news' => $news,
    ]) ?>

</div>
