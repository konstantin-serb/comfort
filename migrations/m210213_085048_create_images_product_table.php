<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images_product}}`.
 */
class m210213_085048_create_images_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images_product}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'mini' => $this->string(),
            'cart_id' => $this->integer(),
            'sort' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%images_product}}');
    }
}
