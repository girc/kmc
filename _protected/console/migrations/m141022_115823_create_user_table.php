<?php

use yii\db\Schema;
use yii\db\Migration;

class m141022_115823_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
            'email' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING . ' UNIQUE',
            'account_activation_token' => Schema::TYPE_STRING,          
            'login_time' => 'BIGINT  DEFAULT NULL',
            'created_time' => 'BIGINT  NOT NULL',
            'updated_time' => 'BIGINT  NOT NULL',
            'sign_up_ip' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'sign_up_agent' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'sign_up_host' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'last_log_in_ip' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'ban_reason' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
