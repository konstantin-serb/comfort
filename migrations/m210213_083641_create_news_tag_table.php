<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_tag}}`.
 */
class m210213_083641_create_news_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_tag}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news_tag}}');
    }
}
