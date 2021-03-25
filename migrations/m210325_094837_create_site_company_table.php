<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_company}}`.
 */
class m210325_094837_create_site_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_company}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'status' => $this->integer(),
            'fonts' => $this->string(),
            'text' => $this->text(),
            'text2' => $this->text(),
            'image1' => $this->string(),
            'image2' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_company}}');
    }
}
