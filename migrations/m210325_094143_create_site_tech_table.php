<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_tech}}`.
 */
class m210325_094143_create_site_tech_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_tech}}', [
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
        $this->dropTable('{{%site_tech}}');
    }
}
