<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "personas".
 *
 * @property integer $id_persona
 * @property string $nombres
 * @property string $apellidos
 * @property string $tipo_documento
 * @property string $documento
 * @property string $ciudad
 * @property string $direccion
 * @property string $celular
 * @property string $correo
 * @property integer $perfil
 * @property string $usuario
 * @property string $contrasena
 * @property string $estado
 * @property integer $rol
 *
 * @property Perfiles $perfil0
 */
class Personas extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $authKey;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'tipo_documento', 'documento', 'ciudad', 'direccion', 'celular', 'correo', 'perfil', 'usuario', 'contrasena', 'estado'], 'required'],
            [['tipo_documento', 'contrasena', 'estado'], 'string'],
            [['perfil', 'rol'], 'integer'],
            [['nombres', 'apellidos'], 'string', 'max' => 80],
            [['documento'], 'string', 'max' => 15],
            [['ciudad', 'direccion'], 'string', 'max' => 50],
            [['celular', 'correo'], 'string', 'max' => 20],
            [['usuario'], 'string', 'max' => 10],
            [['documento'], 'unique'],
            [['perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfiles::className(), 'targetAttribute' => ['perfil' => 'id_perfil']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona' => 'Id Persona',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'tipo_documento' => 'Tipo Documento',
            'documento' => 'Documento',
            'ciudad' => 'Ciudad',
            'direccion' => 'Direccion',
            'celular' => 'Celular',
            'correo' => 'Correo',
            'perfil' => 'Perfil',
            'usuario' => 'Usuario',
            'contrasena' => 'Contrasena',
            'estado' => 'Estado',
            'rol' => 'Rol',
        ];
    }


     public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

     public static function findByUsername($username)
    {
        $user = self::findOne(['usuario'=>$username]);
        if($user){
            return $user;
        }
        return null;
    }

    public function validatePassword($password)
    {
        return $this->contrasena == $password;
    }

     public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

        public function getId()
    {
        return $this->id_persona;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil0()
    {
        return $this->hasOne(Perfiles::className(), ['id_perfil' => 'perfil']);
    }
}
