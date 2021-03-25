<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_designers}}`.
 */
class m210325_094543_create_site_designers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_designers}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status' => $this->integer(),
            'fonts' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_designers}}');
    }
}
