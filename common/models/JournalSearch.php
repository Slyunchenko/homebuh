<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Journal;

class JournalSearch extends Journal
{
    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['id'], 'integer', 'message' => 'Ошибка ввода! введите числовое значение'],
            [['buh_types_id'], 'safe'],
            [['providers_id'], 'safe'],
            [['counter'], 'safe'],
            [['date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Journal::find();

        $dataProviders = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProviders;
        }


        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['buh_types_id' => $this->buh_types_id]);
        $query->andFilterWhere(['providers_id' => $this->providers_id]);
        $query->andFilterWhere(['counter' => $this->counter]);
        $query->andFilterWhere(['date'=> $this->date]);


        return $dataProviders;
    }
}