<?php

use yii\db\pgsql\Schema;
use yii\db\Migration;

class m150803_163610_create_table_temp_uploaded_file extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%temp_uploaded_file}}', [
            'id' => Schema::TYPE_BIGPK,
            'base_name'=>Schema::TYPE_TEXT ,//-- Original file base name [ defined by yii\web\UploadedFile
            'error' => Schema::TYPE_INTEGER,//An error code describing the status of this file uploading....
            'extension' => Schema::TYPE_TEXT,//-- File extension
            'has_error' => Schema::TYPE_BOOLEAN,//-- Whether there is an error with the uploaded file.
            'name' => Schema::TYPE_TEXT,//-- The original name of the file being uploaded
            'size' => Schema::TYPE_INTEGER,//-- The actual size of the uploaded file in bytes
            'temp_name' => Schema::TYPE_TEXT,//-- The path of the uploaded file on the server
            'type' => Schema::TYPE_TEXT,// -- The MIME-type of the uploaded file (such as "image/gif").
            'data' => 'json',//-- Data submitted with the file
            'file' => Schema::TYPE_TEXT,//-- attribute to be used for file widget in Yii2
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%temp_uploaded_file}}');
    }

}
