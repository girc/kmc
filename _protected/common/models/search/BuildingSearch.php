<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Building;

/**
 * BuildingSearch represents the model behind the search form about `common\models\Building`.
 */
class BuildingSearch extends Building
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'location_id', 'user_id'], 'integer'],
            [['inventory_id', 'house_no', 'kitta_no', 'construction_date_age', 'renovation_history', 'important_features', 'historical_socio_cultural_significance', 'architectural_style', 'present_use', 'description', 'owner_name', 'contact_no', 'items_to_be_preserved_before', 'surveyor_opinion_before', 'old_date', 'recorded_by', 'items_to_be_preserved_after', 'surveyor_opinion_after', 'new_date', 'damage_type', 'present_physical_conditions', 'timestamp_created_at', 'timestamp_updated_at'], 'safe'],
            [['verified'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Building::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'location_id' => $this->location_id,
            'new_date' => $this->new_date,
            'timestamp_created_at' => $this->timestamp_created_at,
            'timestamp_updated_at' => $this->timestamp_updated_at,
            'user_id' => $this->user_id,
            'verified' => $this->verified,
        ]);

        $query->andFilterWhere(['like', 'inventory_id', $this->inventory_id])
            ->andFilterWhere(['like', 'house_no', $this->house_no])
            ->andFilterWhere(['like', 'kitta_no', $this->kitta_no])
            ->andFilterWhere(['like', 'construction_date_age', $this->construction_date_age])
            ->andFilterWhere(['like', 'renovation_history', $this->renovation_history])
            ->andFilterWhere(['like', 'important_features', $this->important_features])
            ->andFilterWhere(['like', 'historical_socio_cultural_significance', $this->historical_socio_cultural_significance])
            ->andFilterWhere(['like', 'architectural_style', $this->architectural_style])
            ->andFilterWhere(['like', 'present_use', $this->present_use])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'owner_name', $this->owner_name])
            ->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'items_to_be_preserved_before', $this->items_to_be_preserved_before])
            ->andFilterWhere(['like', 'surveyor_opinion_before', $this->surveyor_opinion_before])
            ->andFilterWhere(['like', 'old_date', $this->old_date])
            ->andFilterWhere(['like', 'recorded_by', $this->recorded_by])
            ->andFilterWhere(['like', 'items_to_be_preserved_after', $this->items_to_be_preserved_after])
            ->andFilterWhere(['like', 'surveyor_opinion_after', $this->surveyor_opinion_after])
            ->andFilterWhere(['like', 'damage_type', $this->damage_type])
            ->andFilterWhere(['like', 'present_physical_conditions', $this->present_physical_conditions]);

        return $dataProvider;
    }
}
