<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "building_before".
 *
 * @property string $id
 * @property string $inventory_id
 * @property string $house_no
 * @property integer $ward_no
 * @property string $owner_name
 * @property string $contact_no
 * @property string $present_use
 * @property string $construction_date_age
 * @property string $renovation_history
 * @property string $architectural_style
 * @property string $important_features
 * @property string $present_physical_conditions
 * @property string $historical_socio_cultural_significance
 * @property string $description
 * @property string $items_to_be_preserved_before
 * @property string $surveyor_opinion_before
 * @property string $recorded_by
 * @property string $old_date
 * @property string $photo_before_1
 * @property string $photo_before_2
 * @property string $photo_before_3
 * @property string $timestamp_created_at
 * @property string $timestamp_updated_at
 * @property string $user_id
 * @property boolean $verified
 *
 * @property User $user
 */
class BuildingBefore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'building_before';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_id', 'house_no', 'present_use', 'renovation_history', 'important_features', 'present_physical_conditions', 'historical_socio_cultural_significance', 'description', 'items_to_be_preserved_before', 'surveyor_opinion_before', 'recorded_by', 'old_date', 'photo_before_1', 'photo_before_2', 'photo_before_3'], 'string'],
            [['ward_no', 'user_id'], 'integer'],
            [['timestamp_created_at', 'timestamp_updated_at'], 'safe'],
            [['verified'], 'boolean'],
            [['owner_name', 'contact_no', 'construction_date_age', 'architectural_style'], 'string', 'max' => 255]
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
            'ward_no' => Yii::t('app', 'Ward No'),
            'owner_name' => Yii::t('app', 'Owner Name'),
            'contact_no' => Yii::t('app', 'Contact No'),
            'present_use' => Yii::t('app', 'Present Use'),
            'construction_date_age' => Yii::t('app', 'Construction Date Age'),
            'renovation_history' => Yii::t('app', 'Renovation History'),
            'architectural_style' => Yii::t('app', 'Architectural Style'),
            'important_features' => Yii::t('app', 'Important Features'),
            'present_physical_conditions' => Yii::t('app', 'Present Physical Conditions'),
            'historical_socio_cultural_significance' => Yii::t('app', 'Historical Socio Cultural Significance'),
            'description' => Yii::t('app', 'Description'),
            'items_to_be_preserved_before' => Yii::t('app', 'Items To Be Preserved Before'),
            'surveyor_opinion_before' => Yii::t('app', 'Surveyor Opinion Before'),
            'recorded_by' => Yii::t('app', 'Recorded By'),
            'old_date' => Yii::t('app', 'Old Date'),
            'photo_before_1' => Yii::t('app', 'Photo Before 1'),
            'photo_before_2' => Yii::t('app', 'Photo Before 2'),
            'photo_before_3' => Yii::t('app', 'Photo Before 3'),
            'timestamp_created_at' => Yii::t('app', 'Timestamp Created At'),
            'timestamp_updated_at' => Yii::t('app', 'Timestamp Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
            'verified' => Yii::t('app', 'Verified'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
