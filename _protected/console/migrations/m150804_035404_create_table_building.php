<?php

use yii\db\Schema;
use yii\db\Migration;

class m150804_035404_create_table_building extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%building}}', [
            // Attributes: Database Entry
            'id' => Schema::TYPE_BIGPK,
            'inventory_id' => 'text',

            // Attributes: Location
            'house_no' => 'text',
            'kitta_no' => 'text',
            'location_id'=>'BIGINT DEFAULT NULL',

            // Attributes: construction
            'construction_date_age' => 'character varying(255)',
            'renovation_history' => 'text',

            // Attributes: Features
            'important_features' => 'text',
            'historical_socio_cultural_significance' => 'text',
            'architectural_style' => 'character varying(255)',
            'present_use' => 'text',
            'description' => 'text',


            // Owner Detail
            'owner_name' => 'character varying(255)',
            'contact_no' => 'character varying(255)',

            // Survey Before Earthquake
            'items_to_be_preserved_before' => 'text',
            'surveyor_opinion_before' => 'text',
            'old_date' => 'text',
            'recorded_by' => 'text',

            // Survey After Earthquake
            'items_to_be_preserved_after' => 'text',
            'surveyor_opinion_after' => 'text',
            'new_date' => 'timestamp without time zone',
            'damage_type' => 'text',
            'present_physical_conditions' => 'text',

            //Report Details
            'timestamp_created_at' => 'timestamp without time zone',
            'timestamp_updated_at' => 'timestamp without time zone',
            'user_id' => 'bigint DEFAULT NULL',
            'verified' => Schema::TYPE_BOOLEAN.' DEFAULT FALSE',

            'FOREIGN KEY (user_id) REFERENCES {{%user}} (id)
                ON DELETE SET NULL ON UPDATE CASCADE',
            'FOREIGN KEY (location_id) REFERENCES {{%location}} (id)
                ON DELETE SET NULL ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%building}}');
    }
}
