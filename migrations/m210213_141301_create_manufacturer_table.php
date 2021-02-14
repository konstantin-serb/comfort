<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manufacturer}}`.
 */
class m210213_141301_create_manufacturer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%manufacturer}}', [
            'id' => $this->primaryKey(),
            'manufactured' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manufacturer}}');
    }
}
