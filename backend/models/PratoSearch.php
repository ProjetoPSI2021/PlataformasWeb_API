<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prato;

/**
 * PratoSearch represents the model behind the search form of `backend\models\Prato`.
 */
class PratoSearch extends Prato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPratos', 'r_id'], 'integer'],
            [['nome', 'imagem', 'tipo', 'r_ingredientes'], 'safe'],
            [['r_preco'], 'number'],
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
        $query = Prato::find();

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
            'idPratos' => $this->idPratos,
            'r_id' => $this->r_id,
            'r_preco' => $this->r_preco,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'imagem', $this->imagem])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'r_ingredientes', $this->r_ingredientes]);
        return $dataProvider;
    }
}
