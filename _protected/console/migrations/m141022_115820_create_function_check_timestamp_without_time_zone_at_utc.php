<?php

use yii\db\Migration;

class m141022_115820_create_function_check_timestamp_without_time_zone_at_utc extends Migration
{
    public function up()
    {
        $sql=<<<SQL
CREATE FUNCTION check_timestamp_without_time_zone_at_utc(timestamp without time zone) RETURNS BOOL
LANGUAGE plpgsql AS $$
begin
   IF EXTRACT(TIMEZONE FROM $1) <> '0' THEN
      RAISE EXCEPTION 'Error:  % must have offset at 0 (ie. at UTC). This is to store all timestamps at UTC. You need to provide timestamp value converted to utc', $1;
   END IF;
   RETURN TRUE;
END;
$$;
SQL;
Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        $sql=<<<SQL
DROP FUNCTION check_timestamp_without_time_zone_at_utc(timestamp without time zone);
SQL;
Yii::$app->db->createCommand($sql)->execute();
    }
}
