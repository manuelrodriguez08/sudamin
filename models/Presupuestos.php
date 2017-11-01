<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presupuestos".
 *
 * @property integer $id_presupuesto
 * @property string $tipo_horno
 * @property string $fecha
 * @property string $actualizacion
 * @property integer $cliente
 * @property integer $valor_final
 * @property integer $descuento
 * @property string $inicio
 * @property string $fin
 * @property string $estado
 *
 * @property Clientes $cliente0
 */
class Presupuestos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presupuestos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_horno', 'fecha', 'actualizacion', 'cliente', 'valor_final', 'descuento', 'inicio', 'fin', 'estado'], 'required'],
            [['tipo_horno', 'estado'], 'string'],
            [['fecha', 'actualizacion', 'inicio', 'fin'], 'safe'],
            [['cliente', 'valor_final', 'descuento'], 'integer'],
            [['cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente' => 'id_cliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_presupuesto' => 'Id Presupuesto',
            'tipo_horno' => 'Tipo Horno',
            'fecha' => 'Fecha',
            'actualizacion' => 'Actualizacion',
            'cliente' => 'Cliente',
            'valor_final' => 'Valor Final',
            'descuento' => 'Descuento',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente0()
    {
        return $this->hasOne(Clientes::className(), ['id_cliente' => 'cliente']);
    }
}
