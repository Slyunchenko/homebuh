<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BuhTypes;

/**
 * BuhTypesSearch represents the model behind the search form of `common\models\BuhTypes`.
 */
class BuhTypesSearch extends BuhTypes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer', 'message' => 'Ошибка! Введите цифровое значение'],
            [['type'], 'safe'],
            [['unit'], 'safe'],
            [['price'], 'double', 'message' => 'Ошибка! Введите цифровое значение'],

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
        $query = BuhTypes::find();

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
        ]);

        $query->andFilterWhere(['like', 'type', $this->type]);
        $query->andFilterWhere(['like', 'unit', $this->unit]);
        $query->andFilterWhere(['like', 'price', $this->price]);


        return $dataProvider;
    }
}
