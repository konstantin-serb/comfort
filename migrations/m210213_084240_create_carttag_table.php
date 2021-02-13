<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carttag}}`.
 */
class m210213_084240_create_carttag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carttag}}', [
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
        $this->dropTable('{{%carttag}}');
    }
}
