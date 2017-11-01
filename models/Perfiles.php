<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfiles".
 *
 * @property integer $id_perfil
 * @property string $nombre
 * @property string $estado
 *
 * @property Personas[] $personas
 */
class Perfiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'estado'], 'required'],
            [['estado'], 'string'],
            [['nombre'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_perfil' => 'Id Perfil',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['perfil' => 'id_perfil']);
    }
}
