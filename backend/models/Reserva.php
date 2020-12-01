<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $idreservas
 * @property int $id_cliente
 * @property int $id_restaurante
 * @property string $data
 * @property string $hora
 * @property string $tipo
 * @property int $npessoas
 * @property int $quartos
 *
 * @property Pedido[] $pedido
 * @property Cliente $cliente
 * @property Restaurante $restaurante
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_restaurante', 'data', 'hora', 'tipo', 'npessoas', 'quartos'], 'required'],
            [['id_cliente', 'id_restaurante', 'npessoas', 'quartos'], 'integer'],
            [['data', 'hora'], 'safe'],
            [['tipo'], 'string', 'max' => 50],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'idCliente']],
            [['id_restaurante'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurante::className(), 'targetAttribute' => ['id_restaurante' => 'idRestaurante']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idreservas' => 'ID Reserva',
            'id_cliente' => 'ID Cliente',
            'id_restaurante' => 'ID Restaurante',
            'data' => 'Data',
            'hora' => 'Hora',
            'tipo' => 'Tipo',
            'npessoas' => 'Nº Pessoas',
            'quartos' => 'Sala',
        ];
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_reserva' => 'idreservas']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['idCliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Restaurante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurante()
    {
        return $this->hasOne(Restaurante::className(), ['idRestaurante' => 'id_restaurante']);
    }
}
