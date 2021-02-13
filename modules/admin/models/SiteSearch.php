<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Site;

/**
 * SiteSearch represents the model behind the search form of `app\modules\admin\models\Site`.
 */
class SiteSearch extends Site
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tel_kyiv', 'tel_voda', 'tel_life', 'address', 'email', 'fb', 'insta', 'in', 'title_main', 'title_main2', 'title_about', 'image_main', 'image_about', 'mini_about', 'text_main', 'text_about1', 'text_about2'], 'safe'],
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
        $query = Site::find();

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

        $query->andFilterWhere(['like', 'tel_kyiv', $this->tel_kyiv])
            ->andFilterWhere(['like', 'tel_voda', $this->tel_voda])
            ->andFilterWhere(['like', 'tel_life', $this->tel_life])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fb', $this->fb])
            ->andFilterWhere(['like', 'insta', $this->insta])
            ->andFilterWhere(['like', 'in', $this->in])
            ->andFilterWhere(['like', 'title_main', $this->title_main])
            ->andFilterWhere(['like', 'title_main2', $this->title_main2])
            ->andFilterWhere(['like', 'title_about', $this->title_about])
            ->andFilterWhere(['like', 'image_main', $this->image_main])
            ->andFilterWhere(['like', 'image_about', $this->image_about])
            ->andFilterWhere(['like', 'mini_about', $this->mini_about])
            ->andFilterWhere(['like', 'text_main', $this->text_main])
            ->andFilterWhere(['like', 'text_about1', $this->text_about1])
            ->andFilterWhere(['like', 'text_about2', $this->text_about2]);

        return $dataProvider;
    }
}
