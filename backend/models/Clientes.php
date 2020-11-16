<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idCliente
 * @property string $username
 * @property string $primeiroNome
 * @property string $ultimoNome
 * @property string $morada
 * @property string $password
 *
 * @property Pedidos[] $pedidos
 * @property Reservas[] $reservas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'primeiroNome', 'ultimoNome', 'morada', 'password'], 'required'],
            [['username', 'primeiroNome', 'ultimoNome', 'morada', 'password'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'username' => 'Username',
            'primeiroNome' => 'Primeiro Nome',
            'ultimoNome' => 'Ultimo Nome',
            'morada' => 'Morada',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['id_clientes' => 'idCliente']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::className(), ['id_cliente' => 'idCliente']);
    }
}
