<?php

use yii\db\pgsql\Schema;
use yii\db\Migration;

class m150803_163609_add_table_user_profile extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%user_profile}}', [
            'id' => Schema::TYPE_BIGPK,
            'user_id'=>Schema::TYPE_BIGINT.' NOT NULL' ,
            'full_name' => Schema::TYPE_STRING . ' NOT NULL',
            'gender' => Schema::TYPE_STRING . '(10) DEFAULT NULL',
            'date_of_birth' => Schema::TYPE_DATE . ' DEFAULT NULL',
            'contact_no' => Schema::TYPE_STRING . ' DEFAULT NULL',
            'address' => Schema::TYPE_STRING . ' DEFAULT NULL',
            'work' => Schema::TYPE_STRING . ' DEFAULT NULL',
            'avatar' => Schema::TYPE_STRING . '  UNIQUE',
            'created_time' => 'BIGINT  NOT NULL',
            'updated_time' => 'BIGINT  NOT NULL',
            'FOREIGN KEY (user_id) REFERENCES {{%user}} (id)
                ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user_profile}}');
    }

}
