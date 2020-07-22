<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subcategory}}`.
 */
class m200716_150233_create_subcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subcategory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'category_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey(
            'fk-subcategory-category_id',
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
        $this->dropForeignKey(
            'fk-subcategory-category_id',
            '{{%subcategory}}'
        );
        $this->dropTable('{{%subcategory}}');
    }
}
