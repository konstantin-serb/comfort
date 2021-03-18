<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about_tag}}`.
 */
class m210213_084849_create_about_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%about_tag}}', [
            'id' => $this->primaryKey(),
            'id_tag' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%about_tag}}');
    }
}
