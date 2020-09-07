<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m200902_164614_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'tovar_id'=>$this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-order-user_id',
            '{{%order}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-order-tovar_id',
            '{{%order}}',
            'tovar_id',
            '{{%tovar}}',
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
            'fk-order-user_id',
            '{{%order}}'
        );
        $this->dropForeignKey(
            'fk-order-tovar_id',
            '{{%order}}'
        );
        $this->dropTable('{{%order}}');
    }
}
