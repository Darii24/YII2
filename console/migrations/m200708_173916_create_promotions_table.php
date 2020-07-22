<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promotions}}`.
 */
class m200708_173916_create_promotions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promotions}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'description'=>$this->text()->notNull(),
            'urlImage'=>$this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promotions}}');
    }
}
