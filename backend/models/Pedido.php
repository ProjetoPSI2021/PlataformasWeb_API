<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $idpedido
 * @property int $id_reserva
 * @property string $data
 * @property string $tipo
 * @property int $id_clientes
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
            [['data', 'tipo', 'id_clientes', 'preco'], 'required'],
            [['id_reserva', 'id_clientes'], 'integer'],
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
            'idpedido' => 'Idpedido',
            'id_reserva' => 'Id Reserva',
            'data' => 'Data',
            'tipo' => 'Tipo',
            'id_clientes' => 'Id Cliente',
            'preco' => 'Preco',
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