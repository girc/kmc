<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "building".
 *
 * @property string $id
 * @property string $inventory_id
 * @property string $house_no
 * @property string $kitta_no
 * @property string $location_id
 * @property string $construction_date_age
 * @property string $renovation_history
 * @property string $important_features
 * @property string $historical_socio_cultural_significance
 * @property string $architectural_style
 * @property string $present_use
 * @property string $description
 * @property string $owner_name
 * @property string $contact_no
 * @property string $items_to_be_preserved_before
 * @property string $surveyor_opinion_before
 * @property string $old_date
 * @property string $recorded_by
 * @property string $items_to_be_preserved_after
 * @property string $surveyor_opinion_after
 * @property string $new_date
 * @property string $damage_type
 * @property string $present_physical_conditions
 * @property string $timestamp_created_at
 * @property string $timestamp_updated_at
 * @property string $user_id
 * @property boolean $verified
 *
 * @property Location $location
 * @property User $user
 * @property Photo[] $photos
 */
class Building extends \yii\db\ActiveRecord
{
    // attributes related to Photo behavior
    public $photoCategory, $previewHeight, $previewWidth, $thumbHeight,$thumbWidth,$directory;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'building';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_id', 'house_no', 'kitta_no', 'renovation_history', 'important_features', 'historical_socio_cultural_significance', 'present_use', 'description', 'items_to_be_preserved_before', 'surveyor_opinion_before', 'old_date', 'recorded_by', 'items_to_be_preserved_after', 'surveyor_opinion_after', 'damage_type', 'present_physical_conditions'], 'string'],
            [['location_id', 'user_id'], 'integer'],
            [['new_date', 'timestamp_created_at', 'timestamp_updated_at'], 'safe'],
            [['verified'], 'boolean'],
            [['construction_date_age', 'architectural_style', 'owner_name', 'contact_no'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'inventory_id' => Yii::t('app', 'Inventory ID'),
            'house_no' => Yii::t('app', 'House No'),
            'kitta_no' => Yii::t('app', 'Kitta No'),
            'location_id' => Yii::t('app', 'Location ID'),
            'construction_date_age' => Yii::t('app', 'Construction Date Age'),
            'renovation_history' => Yii::t('app', 'Renovation History'),
            'important_features' => Yii::t('app', 'Important Features'),
            'historical_socio_cultural_significance' => Yii::t('app', 'Historical Socio Cultural Significance'),
            'architectural_style' => Yii::t('app', 'Architectural Style'),
            'present_use' => Yii::t('app', 'Present Use'),
            'description' => Yii::t('app', 'Description'),
            'owner_name' => Yii::t('app', 'Owner Name'),
            'contact_no' => Yii::t('app', 'Contact No'),
            'items_to_be_preserved_before' => Yii::t('app', 'Items To Be Preserved Before'),
            'surveyor_opinion_before' => Yii::t('app', 'Surveyor Opinion Before'),
            'old_date' => Yii::t('app', 'Old Date'),
            'recorded_by' => Yii::t('app', 'Recorded By'),
            'items_to_be_preserved_after' => Yii::t('app', 'Items To Be Preserved After'),
            'surveyor_opinion_after' => Yii::t('app', 'Surveyor Opinion After'),
            'new_date' => Yii::t('app', 'New Date'),
            'damage_type' => Yii::t('app', 'Damage Type'),
            'present_physical_conditions' => Yii::t('app', 'Present Physical Conditions'),
            'timestamp_created_at' => Yii::t('app', 'Timestamp Created At'),
            'timestamp_updated_at' => Yii::t('app', 'Timestamp Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
            'verified' => Yii::t('app', 'Verified'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['building_id' => 'id']);
    }
}
