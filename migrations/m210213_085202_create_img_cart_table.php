<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%img_cart}}`.
 */
class m210213_085202_create_img_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%img_cart}}', [
            'id' => $this->primaryKey(),
            'id_cart' => $this->integer(),
            'id_image' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%img_cart}}');
    }
}
