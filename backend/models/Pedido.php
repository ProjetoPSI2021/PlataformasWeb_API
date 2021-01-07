<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $idpedido
 * @property int $idrestaurantepedido
 * @property int $id_reserva
 * @property string $data
 * @property string $tipo
 * @property string $estadopedido
 * @property int $id_clientes
 * @property int $idpratoorder
 * @property float $preco
 *
 * @property Cliente $cliente
 * @property Reserva $reserva
 * @property Prato[] $prato
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'id_clientes', 'preco','idrestaurantepedido'], 'required'],
            [['id_reserva','idpratoorder', 'id_clientes','idrestaurantepedido'], 'integer'],
            [['data'], 'safe'],
            [['tipo'], 'string'],
            [['preco'], 'number'],
            [['id_clientes'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_clientes' => 'idCliente']],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['id_reserva' => 'idreservas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpedido' => 'ID Pedido',
            'idrestaurantepedido' => 'ID Restaurante',
            'idpratoorder' => 'ID Prato Pedido',
            'id_reserva' => 'ID Reserva',
            'data' => 'Data',
            'tipo' => 'Tipo',
            'id_clientes' => 'ID Cliente',
            'preco' => 'Preço',
            'estadopedido' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasOne(Cliente::className(), ['idCliente' => 'id_clientes']);
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['idreservas' => 'id_reserva']);
    }

    /**
     * Gets query for [[Prato]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPratos()
    {
        return $this->hasMany(Prato::className(), ['id_pedidos' => 'idpedido']);
    }
}
