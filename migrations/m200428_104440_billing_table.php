<?php

use yii\db\Migration;

/**
 * Class m200428_104440_billing_table
 */
class m200428_104440_billing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%billing}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'invoice_name' => $this->string()->notNull()->unique(),            
            'price' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('fk_to_user', 'billing', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_to_user', 'billing');
        $this->dropTable('{{%billing}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200428_104440_billing_table cannot be reverted.\n";

        return false;
    }
    */
}
