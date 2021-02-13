<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m210213_081214_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(),
            'title' => $this->string(),
            'text' => $this->text(),
            'description' => $this->text(),
            'image' => $this->string(),
            'mini' => $this->string(),
            'status' => $this->integer(),
            'time_create' => $this->integer(),
            'time_update' => $this->integer(),
            'user_create' => $this->integer(),
            'user_update' => $this->integer(),
            'type_view' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
