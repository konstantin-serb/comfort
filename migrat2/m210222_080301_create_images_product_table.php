<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images_product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%cart}}`
 */
class m210222_080301_create_images_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images_product}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->notNull(),
            'mini' => $this->string()->notNull(),
            'cart_id' => $this->integer()->notNull(),
            'sort' => $this->integer(),
        ]);

        // creates index for column `cart_id`
        $this->createIndex(
            '{{%idx-images_product-cart_id}}',
            '{{%images_product}}',
            'cart_id'
        );

        // add foreign key for table `{{%cart}}`
        $this->addForeignKey(
            '{{%fk-images_product-cart_id}}',
            '{{%images_product}}',
            'cart_id',
            '{{%cart}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%cart}}`
        $this->dropForeignKey(
            '{{%fk-images_product-cart_id}}',
            '{{%images_product}}'
        );

        // drops index for column `cart_id`
        $this->dropIndex(
            '{{%idx-images_product-cart_id}}',
            '{{%images_product}}'
        );

        $this->dropTable('{{%images_product}}');
    }
}
