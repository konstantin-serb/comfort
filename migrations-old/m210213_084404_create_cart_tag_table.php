<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart_tag}}`.
 */
class m210213_084404_create_cart_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart_tag}}', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cart_tag}}');
    }
}
