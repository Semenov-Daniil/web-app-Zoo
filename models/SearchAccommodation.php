<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accommodation;

/**
 * SearchAccommodation represents the model behind the search form of `app\models\Accommodation`.
 */
class SearchAccommodation extends Accommodation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kinds_id', 'premises_id', 'count_animals'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Accommodation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kinds_id' => $this->kinds_id,
            'premises_id' => $this->premises_id,
            'count_animals' => $this->count_animals,
        ]);

        return $dataProvider;
    }
}
