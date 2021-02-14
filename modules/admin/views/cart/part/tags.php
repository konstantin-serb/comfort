<?php

?>

<?php use yii\helpers\Html;

if ($cartTag):?>
    <h2>Привязанные теги</h2>
    <?php foreach($cartTag as $tag):?>
        <?= Html::a($tag->title, ['delete-link', 'id' => $model->id ,'tag_id' => $tag->id], [
            'class' => 'btn btn-default',
            'data' => [
                'confirm' => 'Удалить данный тег из товара?',
                'method' => 'post',
            ],
        ]) ?>

    <?php endforeach;?>
    <br><br>

<?php endif;?>
