<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%newstag}}`.
 */
class m210213_083346_create_newstag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%newstag}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%newstag}}');
    }
}
