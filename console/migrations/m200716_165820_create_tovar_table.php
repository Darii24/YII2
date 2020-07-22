<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tovar}}`.
 */
class m200716_165820_create_tovar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tovar}}', [
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'description'=>$this->text()->notNull(),
            'urlImages'=>'json',
            'count'=>$this->integer()->notNull(),
            'category_id'=>$this->integer()->notNull(),
            'subcategory_id'=>$this->integer()->notNull(),
            'price'=>$this->float()->notNull(),
            'discount_id'=>$this->integer(),
        ]);
        $this->addForeignKey(
            'fk-tovar-category_id',
            '{{%tovar}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-tovar-subcategory_id',
            '{{%tovar}}',
            'subcategory_id',
            '{{%subcategory}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-tovar-discount_id',
            '{{%tovar}}',
            'discount_id',
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
            'fk-tovar-category_id',
            '{{%tovar}}'
        );
        $this->dropForeignKey(
            'fk-tovar-subcategory_id',
            '{{%tovar}}'
        );
        $this->dropForeignKey(
            'fk-tovar-discount_id',
            '{{%tovar}}'
        );
        $this->dropTable('{{%tovar}}');
    }
}
