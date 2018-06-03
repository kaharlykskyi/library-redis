<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class BookSearch extends Book
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'author', 'year', 'rating'], 'safe'],
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
        $query = Book::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //'title', 'author', 'year', 'rating'
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['title' => $this->title])
            ->andFilterWhere(['author' => $this->author])
            ->andFilterWhere(['year' => $this->year])
            ->andFilterWhere(['rating' => $this->rating]);

        return $dataProvider;
    }
}
