<?php

use yii\db\Schema;
use yii\db\Migration;

class m150804_035334_create_table_location extends Migration
{

    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%location}}', [
            'id' => Schema::TYPE_BIGPK,
            'country_code'=>Schema::TYPE_INTEGER,
            'development_region'=>Schema::TYPE_INTEGER,
            'zone'=>Schema::TYPE_INTEGER,
            'd_code'=>Schema::TYPE_INTEGER,
            'v_code'=>Schema::TYPE_INTEGER,
            'ward_no'=>Schema::TYPE_INTEGER,
            'location_name'=>Schema::TYPE_STRING,
            'latitude'=>Schema::TYPE_DOUBLE,
            'longitude'=>Schema::TYPE_DOUBLE,
            'verified'=>Schema::TYPE_BOOLEAN.' DEFAULT FALSE',
            'geom' => 'geometry(Point)'
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%location}}');
    }
}
