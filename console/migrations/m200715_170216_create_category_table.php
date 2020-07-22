<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m200715_170216_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'description'=>$this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
