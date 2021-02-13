<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 */
class m210213_081449_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(),
            'title' => $this->string(),
            'text' => $this->text(),
            'description' => $this->text(),
            'info' => $this->text(),
            'model' => $this->string(),
            'manufacturer' => $this->string(),
            'availability' => $this->integer(),
            'subcategory_id' => $this->integer(),
            'status' => $this->integer(),
            'time_create' => $this->integer(),
            'time_update' => $this->integer(),
            'user_create' => $this->integer(),
            'user_update' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cart}}');
    }
}
