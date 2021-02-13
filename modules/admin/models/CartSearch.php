<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Cart;

/**
 * CartSearch represents the model behind the search form of `app\modules\admin\models\Cart`.
 */
class CartSearch extends Cart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'availability', 'subcategory_id', 'status', 'time_create', 'time_update', 'user_create', 'user_update'], 'integer'],
            [['slug', 'title', 'text', 'description', 'info', 'model', 'manufacturer'], 'safe'],
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
        $query = Cart::find();

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
            'availability' => $this->availability,
            'subcategory_id' => $this->subcategory_id,
            'status' => $this->status,
            'time_create' => $this->time_create,
            'time_update' => $this->time_update,
            'user_create' => $this->user_create,
            'user_update' => $this->user_update,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'manufacturer', $this->manufacturer]);

        return $dataProvider;
    }
}
