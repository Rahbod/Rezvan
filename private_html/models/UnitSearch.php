<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unit;

/**
 * SearchUnit represents the model behind the search form of `app\models\Unit`.
 * @property mixed|null project_blocks
 */
class UnitSearch extends Unit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userID', 'modelID', 'status','itemID'], 'integer'],
            [['type'], 'number'],
            [['name', 'dyna', 'extra', 'created', 'project_blocks'], 'safe'],
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
        $query = Unit::find();

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
            'userID' => $this->userID,
            'modelID' => $this->modelID,
            'type' => $this->type,
            'status' => $this->status,
            self::columnGetString('project_blocks') => $this->project_blocks, // dynamic field
            self::columnGetString('itemID') => $this->itemID // dynamic field

        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
