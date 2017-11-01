<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presupuestos;

/**
 * PresupuestoSearch represents the model behind the search form about `app\models\Presupuestos`.
 */
class PresupuestoSearch extends Presupuestos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_presupuesto', 'cliente', 'valor_final', 'descuento'], 'integer'],
            [['tipo_horno', 'fecha', 'actualizacion', 'inicio', 'fin', 'estado'], 'safe'],
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
        $query = Presupuestos::find();

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
            'id_presupuesto' => $this->id_presupuesto,
            'fecha' => $this->fecha,
            'actualizacion' => $this->actualizacion,
            'cliente' => $this->cliente,
            'valor_final' => $this->valor_final,
            'descuento' => $this->descuento,
            'inicio' => $this->inicio,
            'fin' => $this->fin,
        ]);

        $query->andFilterWhere(['like', 'tipo_horno', $this->tipo_horno])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
