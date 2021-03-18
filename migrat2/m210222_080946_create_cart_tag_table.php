<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart_tag}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%cart}}`
 * - `{{%carttag}}`
 */
class m210222_080946_create_cart_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart_tag}}', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `cart_id`
        $this->createIndex(
            '{{%idx-cart_tag-cart_id}}',
            '{{%cart_tag}}',
            'cart_id'
        );

        // add foreign key for table `{{%cart}}`
        $this->addForeignKey(
            '{{%fk-cart_tag-cart_id}}',
            '{{%cart_tag}}',
            'cart_id',
            '{{%cart}}',
            'id',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            '{{%idx-cart_tag-tag_id}}',
            '{{%cart_tag}}',
            'tag_id'
        );

        // add foreign key for table `{{%carttag}}`
        $this->addForeignKey(
            '{{%fk-cart_tag-tag_id}}',
            '{{%cart_tag}}',
            'tag_id',
            '{{%carttag}}',
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
            '{{%fk-cart_tag-cart_id}}',
            '{{%cart_tag}}'
        );

        // drops index for column `cart_id`
        $this->dropIndex(
            '{{%idx-cart_tag-cart_id}}',
            '{{%cart_tag}}'
        );

        // drops foreign key for table `{{%carttag}}`
        $this->dropForeignKey(
            '{{%fk-cart_tag-tag_id}}',
            '{{%cart_tag}}'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            '{{%idx-cart_tag-tag_id}}',
            '{{%cart_tag}}'
        );

        $this->dropTable('{{%cart_tag}}');
    }
}
