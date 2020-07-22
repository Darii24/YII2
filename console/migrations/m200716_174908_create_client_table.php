<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m200716_174908_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'secondname'=>$this->string()->notNull(),
            'firstname'=>$this->string()->notNull(),
            'surname'=>$this->string()->notNull(),
            'email'=>$this->string()->notNull(),
            'phone'=>$this->string()->notNull(),    
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
