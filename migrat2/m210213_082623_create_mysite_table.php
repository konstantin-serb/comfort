<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mysite}}`.
 */
class m210213_082623_create_mysite_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mysite}}', [
            'id' => $this->primaryKey(),
            'tel_kyiv' => $this->string()->notNull(),
            'tel_voda' => $this->string()->notNull(),
            'tel_life' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'fb' => $this->string()->notNull(),
            'insta' => $this->string()->notNull(),
            'in' => $this->string()->notNull(),
            'title_main' => $this->string()->notNull(),
            'title_main2' => $this->string()->notNull(),
            'title_about' => $this->string()->notNull(),
            'image_main' => $this->string(),
            'image_about' => $this->string(),
            'mini_about' => $this->string(),
            'text_main' => $this->text()->notNull(),
            'text_about1' => $this->text()->notNull(),
            'text_about2' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mysite}}');
    }
}
