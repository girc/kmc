<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/4/2015
 * Time: 3:22 PM
 */

namespace common\models\search;


use common\models\Photo;
use yii\data\ActiveDataProvider;

class PhotoSearch extends Photo{
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Photo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'verified' => $this->verified,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'rank', $this->rank])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'original', $this->original])
            ->andFilterWhere(['like', 'medium', $this->medium])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'filename', $this->filename]);
        return $dataProvider;
    }
}