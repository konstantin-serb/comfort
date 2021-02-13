<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projecttag}}`.
 */
class m210213_084541_create_projecttag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projecttag}}', [
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
        $this->dropTable('{{%projecttag}}');
    }
}
