<?php

use yii\db\Migration;

/**
 * Class m200706_175455_ownerUser
 */
class m200706_175455_ownerUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $ownerRole = $auth->getRole('owner');
        $auth->assign($ownerRole, 2);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200706_175455_ownerUser cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200706_175455_ownerUser cannot be reverted.\n";

        return false;
    }
    */
}
