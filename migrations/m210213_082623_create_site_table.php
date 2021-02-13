<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site}}`.
 */
class m210213_082623_create_site_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site}}', [
            'id' => $this->primaryKey(),
            'tel_kyiv' => $this->string(),
            'tel_voda' => $this->string(),
            'tel_life' => $this->string(),
            'address' => $this->string(),
            'email' => $this->string(),
            'fb' => $this->string(),
            'insta' => $this->string(),
            'in' => $this->string(),
            'title_main' => $this->string(),
            'title_main2' => $this->string(),
            'title_about' => $this->string(),
            'image_main' => $this->string(),
            'image_about' => $this->string(),
            'mini_about' => $this->string(),
            'text_main' => $this->text(),
            'text_about1' => $this->text(),
            'text_about2' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site}}');
    }
}
