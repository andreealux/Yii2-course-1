<?php

use yii\db\Migration;

/**
 * Class m221031_121243_first_migration
 */
class m221031_121243_first_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'status' => $this->boolean(),
            'created_at' => $this->integer()
        ]);
        $this->addColumn('user', 'email', $this->string(512)->notNull());

        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'user_id' => $this->integer()
        ]);

        $this->addForeignKey('FK_post_user', 'post', 'user_id', 'user', 'id');
        $this->insert('user', [
            'username' => 'zura',
            'email' => 'something@example.com',
            'status' => 1,
            'created_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_post_user', 'post');
        $this->dropTable('post');
        $this->dropTable('user');
    }

}
