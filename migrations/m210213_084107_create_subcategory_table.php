<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subcategory}}`.
 */
class m210213_084107_create_subcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subcategory}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string(),
            'category_id' => $this->integer(),
            'order' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subcategory}}');
    }
}
