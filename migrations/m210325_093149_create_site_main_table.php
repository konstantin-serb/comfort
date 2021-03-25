<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_main}}`.
 */
class m210325_093149_create_site_main_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_main}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'title2' => $this->string(),
            'text' => $this->text(),
            'image_main' => $this->string(),
            'image2' => $this->string(),
            'image3' => $this->string(),
            'image_map' => $this->string(),
            'tel1' => $this->string(),
            'tel2' => $this->string(),
            'tel3' => $this->string(),
            'email' => $this->string(),
            'address' => $this->string(),
            'fb1' => $this->string(),
            'fb2' => $this->string(),
            'fb3' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_main}}');
    }
}
