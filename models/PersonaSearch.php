<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personas;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Personas`.
 */
class PersonaSearch extends Personas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona', 'perfil', 'rol'], 'integer'],
            [['nombres', 'apellidos', 'tipo_documento', 'documento', 'ciudad', 'direccion', 'celular', 'correo', 'usuario', 'contrasena', 'estado'], 'safe'],
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
        $query = Personas::find();

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
            'id_persona' => $this->id_persona,
            'perfil' => $this->perfil,
            'rol' => $this->rol,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'tipo_documento', $this->tipo_documento])
            ->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'contrasena', $this->contrasena])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
