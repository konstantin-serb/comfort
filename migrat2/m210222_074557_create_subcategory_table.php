<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subcategory}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m210222_074557_create_subcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subcategory}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'category_id' => $this->integer()->notNull(),
            'order' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-subcategory-category_id}}',
            '{{%subcategory}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-subcategory-category_id}}',
            '{{%subcategory}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-subcategory-category_id}}',
            '{{%subcategory}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-subcategory-category_id}}',
            '{{%subcategory}}'
        );

        $this->dropTable('{{%subcategory}}');
    }
}
