<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_tag}}`.
 */
class m210213_084714_create_project_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_tag}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project_tag}}');
    }
}
