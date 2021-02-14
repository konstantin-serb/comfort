<?php
/**
 * @var $project
 * @var $model
 */

use yii\helpers\Html;

$this->title = 'Редактирование проекта: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование проекта';

$model->title = $project->title;
$model->text = $project->text;
$model->description = $project->description;
$model->type_view = $project->type_view;
$model->status = $project->status;
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update_form', [
        'model' => $model,
    ]) ?>

</div>
