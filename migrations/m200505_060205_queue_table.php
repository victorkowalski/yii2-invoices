<?php

use yii\db\Migration;

/**
 * Class m200505_060205_queue_table
 */
class m200505_060205_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200505_060205_queue_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200505_060205_queue_table cannot be reverted.\n";

        return false;
    }
    */
}
