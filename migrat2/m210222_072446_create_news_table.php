<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m210222_072446_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull(),
            'text' => $this->text(),
            'description' => $this->text()->notNull(),
            'image' => $this->string(),
            'mini' => $this->string(),
            'status' => $this->integer()->notNull(),
            'time_create' => $this->integer()->notNull(),
            'time_update' => $this->integer(),
            'user_create' => $this->integer()->notNull(),
            'user_update' => $this->integer(),
            'type_view' => $this->integer()->notNull(),
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
