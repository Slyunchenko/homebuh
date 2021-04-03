<?php


namespace common\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProvidersSearch extends Providers
{
    public function rules()
    {
        return [
        [['id'], 'integer', 'message'=> 'Ошибка! Введите цифровое значение'],
        [['provider_name'], 'safe'],
        [['account'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Providers::find();

        $this->load($params);

        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        $query->andFilterWhere(['like', 'provider_name', $this->provider_name]);


        $query->andFilterWhere(['account' => $this->account]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $dataProvider;
    }
}