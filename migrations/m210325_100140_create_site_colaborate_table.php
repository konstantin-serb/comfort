<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_colaborate}}`.
 */
class m210325_100140_create_site_colaborate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_colaborate}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'status' => $this->integer(),
            'text' => $this->text(),
            'link' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_colaborate}}');
    }
}
