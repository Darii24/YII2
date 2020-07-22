<?php

use yii\db\Migration;

/**
 * Class m200706_160320_adminUser
 */
class m200706_160320_adminUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200706_160320_adminUser cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200706_160320_adminUser cannot be reverted.\n";

        return false;
    }
    */
}
