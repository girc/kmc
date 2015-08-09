<?php

namespace common\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "location".
 *
 * @property string $id
 * @property integer $country_code
 * @property integer $development_region
 * @property integer $zone
 * @property integer $d_code
 * @property integer $v_code
 * @property integer $ward_no
 * @property string $location_name
 * @property double $latitude
 * @property double $longitude
 * @property boolean $verified
 * @property string $geom
 *
 * @property Building[] $buildings
 * @property Photo[] $photos
 */
class Location extends \yii\db\ActiveRecord
{
    CONST SRID=4326;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code', 'development_region', 'zone', 'd_code', 'v_code', 'ward_no'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['verified'], 'boolean'],
            [['geom'], 'string'],
            [['location_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_code' => Yii::t('app', 'Country Code'),
            'development_region' => Yii::t('app', 'Development Region'),
            'zone' => Yii::t('app', 'Zone'),
            'd_code' => Yii::t('app', 'D Code'),
            'v_code' => Yii::t('app', 'V Code'),
            'ward_no' => Yii::t('app', 'Ward No'),
            'location_name' => Yii::t('app', 'Location Name'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'verified' => Yii::t('app', 'Verified'),
            'geom' => Yii::t('app', 'Geom'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuildings()
    {
        return $this->hasMany(Building::className(), ['location_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['location_id' => 'id']);
    }

    /**
     * @param $latitude number
     * @param $longitude number
     */
    public function setGeometry($latitude,$longitude){
        if($latitude && $longitude){
            $wkt = "POINT($this->longitude $this->latitude)";
            $this->geom=new Expression("(SELECT ST_GeomFromText('".$wkt."',".$this::SRID."))");
        }
    }

    private function someHacks(){
        if(is_array($this->present_physical_conditions))
            $this->present_physical_conditions=implode(',',$this->present_physical_conditions);
        if(is_array($this->historical_socio_cultural_significance))
            $this->historical_socio_cultural_significance=implode(',',$this->historical_socio_cultural_significance);
        if(is_array($this->important_features))
            $this->important_features=implode(',',$this->important_features);
        if(is_array($this->items_to_be_preserved_before))
            $this->items_to_be_preserved_before=implode(',',$this->items_to_be_preserved_before);

        /* Because of spelling mistake in android app ( preseved instead of preserved in ) */
        //{{{
        $postData=Yii::$app->getRequest()->post()['Heritage'];
        if(isset($postData['items_to_be_preseved_after'])){
            $this->items_to_be_preserved_after=Yii::$app->getRequest()->post()['Heritage']['items_to_be_preseved_after'];
        }
        //}}}

        if(is_array($this->items_to_be_preserved_after))
            $this->items_to_be_preserved_after=implode(',',$this->items_to_be_preserved_after);

    }
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);

        $this->someHacks();

        $this->setGeometry($this->latitude,$this->longitude);

        return true;
    }


}
