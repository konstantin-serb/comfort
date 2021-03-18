<?php
/**
 * @var $project
 * @var $model
 */

use yii\helpers\Html;
use app\components\StringHelper;

$this->title = 'Редактирование проекта: ' . $project->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => StringHelper::getShort($project->title, 10), 'url' => ['view', 'id' => $model->id]];
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
        'project' => $project,
    ]) ?>

</div>
