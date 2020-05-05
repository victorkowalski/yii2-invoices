<?php

use yii\db\Migration;

/**
 * Class m200505_060205_queue_table
 */
class m200505_060205_queue_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%queue}}', [
            'id' => $this->primaryKey(),
            'channel' => $this->string()->notNull(),
            'job' => $this->binary()->notNull(),
            'pushed_at' => $this->integer()->notNull(),
            'ttr' => $this->integer()->notNull(),
            'delay' => $this->integer()->notNull()->defaultValue(0),
            'priority' => $this->integer()->unsigned()->notNull()->defaultValue(1024),
            'reserved_at' => $this->integer()->defaultValue(NULL),
            'attempt' => $this->integer()->defaultValue(NULL),
            'done_at' => $this->integer()->defaultValue(NULL),
        ], $tableOptions);

        $this->createIndex('idx-queue-channel', 'queue', 'channel');
        $this->createIndex('idx-queue-reserved_at', 'queue', 'reserved_at');
        $this->createIndex('idx-queue-priority', 'queue', 'priority');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%queue}}');
    }
}
