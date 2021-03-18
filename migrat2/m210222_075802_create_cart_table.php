<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%manufacturer}}`
 * - `{{%subcategory}}`
 */
class m210222_075802_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'info' => $this->text()->notNull(),
            'price' => $this->float()->notNull(),
            'model' => $this->string(),
            'manufacturer' => $this->integer()->notNull(),
            'availability' => $this->integer()->notNull(),
            'subcategory_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'time_create' => $this->integer()->notNull(),
            'time_update' => $this->integer(),
            'user_create' => $this->integer()->notNull(),
            'user_update' => $this->integer(),
            'recommend' => $this->integer(),
        ]);

        // creates index for column `manufacturer`
        $this->createIndex(
            '{{%idx-cart-manufacturer}}',
            '{{%cart}}',
            'manufacturer'
        );

        // add foreign key for table `{{%manufacturer}}`
        $this->addForeignKey(
            '{{%fk-cart-manufacturer}}',
            '{{%cart}}',
            'manufacturer',
            '{{%manufacturer}}',
            'id',
            'CASCADE'
        );

        // creates index for column `subcategory_id`
        $this->createIndex(
            '{{%idx-cart-subcategory_id}}',
            '{{%cart}}',
            'subcategory_id'
        );

        // add foreign key for table `{{%subcategory}}`
        $this->addForeignKey(
            '{{%fk-cart-subcategory_id}}',
            '{{%cart}}',
            'subcategory_id',
            '{{%subcategory}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%manufacturer}}`
        $this->dropForeignKey(
            '{{%fk-cart-manufacturer}}',
            '{{%cart}}'
        );

        // drops index for column `manufacturer`
        $this->dropIndex(
            '{{%idx-cart-manufacturer}}',
            '{{%cart}}'
        );

        // drops foreign key for table `{{%subcategory}}`
        $this->dropForeignKey(
            '{{%fk-cart-subcategory_id}}',
            '{{%cart}}'
        );

        // drops index for column `subcategory_id`
        $this->dropIndex(
            '{{%idx-cart-subcategory_id}}',
            '{{%cart}}'
        );

        $this->dropTable('{{%cart}}');
    }
}
