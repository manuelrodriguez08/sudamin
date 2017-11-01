<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property integer $id_cliente
 * @property string $razon_social
 * @property string $rut
 * @property string $ciudad
 * @property string $direccion
 * @property string $telefono
 * @property string $contacto
 * @property string $estado
 *
 * @property Presupuestos[] $presupuestos
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['razon_social', 'rut', 'ciudad', 'direccion', 'telefono', 'contacto', 'estado'], 'required'],
            [['estado'], 'string'],
            [['razon_social'], 'string', 'max' => 100],
            [['rut'], 'string', 'max' => 15],
            [['ciudad', 'direccion', 'contacto'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 20],
            [['rut'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'razon_social' => 'Razon Social',
            'rut' => 'Rut',
            'ciudad' => 'Ciudad',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'contacto' => 'Contacto',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresupuestos()
    {
        return $this->hasMany(Presupuestos::className(), ['cliente' => 'id_cliente']);
    }
}
