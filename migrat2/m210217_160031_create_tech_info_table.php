<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tech_info}}`.
 */
class m210217_160031_create_tech_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tech_info}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'format' => $this->string()->notNull(),
            'size' => $this->float(),
            'link' => $this->string(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tech_info}}');
    }
}
