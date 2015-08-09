<?php

use yii\db\Schema;
use yii\db\Migration;

class m141022_115821_create_function_check_timestamp_with_time_zone_at_utc extends Migration
{
    public function up()
    {
      $sql=<<<SQL
CREATE FUNCTION check_timestamp_with_time_zone_at_utc(timestamp with time zone) RETURNS BOOL
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
DROP FUNCTION check_timestamp_with_time_zone_at_utc(timestamp with time zone);
SQL;
        Yii::$app->db->createCommand($sql)->execute();

    }
}
