<?php

namespace app\models\projects;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ApartmentSearch represents the model behind the search form of `app\models\projects\Apartment`.
 */
class ApartmentSearch extends Apartment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['type'], 'number'],
            [['name', 'dyna', 'extra', 'created','subtitle'], 'safe'],
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
        $query = Apartment::find();

//            ->andWhere([
//            ['con1' => 55],
//            [
//                'or',
//                [
//                    ['con2' => 1],
//                    ['like', 'con3', 'asdsad']
//                ]
//            ]
//        ])->count();

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
//        $query->andFilterWhere([
//            'id' => $this->id,
//            'type' => $this->type,
//            'status' => $this->status,
//        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'dyna', $this->dyna])
            ->andFilterWhere(['like', 'subtitle', $this->dyna])
            ->andFilterWhere(['like', 'extra', $this->extra]);

        return $dataProvider;
    }
}
