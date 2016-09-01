<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProdCat;

/**
 * ProdCatSearch represents the model behind the search form about `app\models\ProdCat`.
 */
class ProdCatSearch extends ProdCat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_cat_id', 'product_id', 'category_id'], 'integer'],
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
        $query = ProdCat::find();

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
            'prod_cat_id' => $this->prod_cat_id,
            'product_id' => $this->product_id,
            'category_id' => $this->category_id,
        ]);

        return $dataProvider;
    }
}
