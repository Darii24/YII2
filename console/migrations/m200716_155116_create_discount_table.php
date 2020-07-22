<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discount}}`.
 */
class m200716_155116_create_discount_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discount}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'discount' => $this->float()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%discount}}');
    }
}
