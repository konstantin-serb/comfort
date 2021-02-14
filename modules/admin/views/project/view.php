<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= Html::a('Добавить изображение', ['add-image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
<?php if ($model->mini): ?>
    <h2>Изображение к статье</h2>
    <div style="max-width: 20em;">
        <a href="<?= Url::to(['image-view', 'id' => $model->id]) ?>">
            <img class="image" src="<?= $model->getMini() ?>">
        </a>
    </div

<?php endif; ?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'text:html',
            'description:html',
//            'image',
//            'mini',
//            'status',
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
//            'time_create:datetime',
//            'time_update:datetime',
//            'user_create',
//            'user_update',
//            'type_view',
        [
                'attribute' => 'type_view',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->type_view == 9) {
                        return '<span class="blue-color">Тип показа без изображения</span>';
                    } else if ($model->type_view == 10) {
                        return '<span class="blue-color">Тип показа с изображением</span>';
                    }

                }
            ],
        ],
    ]) ?>

</div>
