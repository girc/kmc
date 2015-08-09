<?php

use yii\db\Schema;
use yii\db\Migration;

class m150804_051931_create_table_photo extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%photo}}', [
            'id' => Schema::TYPE_BIGPK,
            'category' => Schema::TYPE_INTEGER,
            'rank'=>Schema::TYPE_INTEGER,
            'building_id'=>Schema::TYPE_BIGINT,
            'inventory_id'=>Schema::TYPE_TEXT,
            'location_id'=>Schema::TYPE_BIGINT,
            'title'=>Schema::TYPE_STRING.'(255)',
            'description'=>Schema::TYPE_TEXT,
            'original'=>Schema::TYPE_TEXT,
            'medium'=>Schema::TYPE_TEXT,
            'thumb'=>Schema::TYPE_TEXT,
            'filename'=>Schema::TYPE_TEXT,
            'taken_time'=>'TIMESTAMP WITH TIME ZONE',
            'verified'=>Schema::TYPE_BOOLEAN.' DEFAULT FALSE',
            'created_time'=>'TIMESTAMP WITH TIME ZONE',
            'updated_time'=>'TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW()',
            'FOREIGN KEY (building_id) REFERENCES {{%building}} (id)
                ON DELETE SET NULL ON UPDATE CASCADE',
            'FOREIGN KEY (location_id) REFERENCES {{%location}} (id)
                ON DELETE SET NULL ON UPDATE CASCADE',
           // "CHECK(check_timestamp_with_time_zone_at_utc(taken_time))",
           // "CHECK(check_timestamp_with_time_zone_at_utc(created_time))",
           // "CHECK(check_timestamp_with_time_zone_at_utc(updated_time))",
        ], $tableOptions);
    }

    /**
    CREATE FUNCTION check_is_timestamp_offset_0(column_name text) RETURNS BOOL
    LANGUAGE plpgsql AS $$
    begin
    IF EXTRACT(TIMEZONE FROM $1) <> '0' THEN
    RAISE EXCEPTION 'Error:  % is required', $2;
    END IF;
    RETURN TRUE;
    END;
    $$;
     */

    public function down()
    {
        $this->dropTable('{{%photo}}');
    }
}
