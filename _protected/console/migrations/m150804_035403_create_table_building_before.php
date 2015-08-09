<?php

use yii\db\Schema;
use yii\db\Migration;

class m150804_035403_create_table_building_before extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%building_before}}', [
            'id' => Schema::TYPE_BIGPK,
            'inventory_id' => 'text',
            'house_no' => 'text',
            'ward_no'=>'integer',
            'owner_name' => 'character varying(255)',
            'contact_no' => 'character varying(255)',
            'present_use' => 'text',
            'construction_date_age' => 'character varying(255)',
            'renovation_history' => 'text',
            'architectural_style' => 'character varying(255)',
            'important_features' => 'text',
            'present_physical_conditions' => 'text',
            'historical_socio_cultural_significance' => 'text',
            'description' => 'text',
            'items_to_be_preserved_before' => 'text',
            'surveyor_opinion_before' => 'text',
            'recorded_by' => 'text',
            'old_date' => 'text',
            'photo_before_1' => 'text',
            'photo_before_2' => 'text',
            'photo_before_3' => 'text',

            'timestamp_created_at' => 'timestamp without time zone',
            'timestamp_updated_at' => 'timestamp without time zone',
            'user_id' => 'bigint DEFAULT NULL',
            'verified' => Schema::TYPE_BOOLEAN.' DEFAULT FALSE',

            'FOREIGN KEY (user_id) REFERENCES {{%user}} (id)
                ON DELETE SET NULL ON UPDATE CASCADE',

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%building_before}}');
    }
}
