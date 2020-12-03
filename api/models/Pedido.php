<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pedido".
 *
 * @property int $idpedido
 * @property int|null $id_reserva
 * @property string $data
 * @property string $tipo
 * @property int $id_clientes
 * @property float $preco
 * @property string $estadopedido
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reserva', 'id_clientes'], 'integer'],
            [['data', 'tipo', 'id_clientes', 'preco', 'estadopedido'], 'required'],
            [['data'], 'safe'],
            [['tipo', 'estadopedido'], 'string'],
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
            'id_clientes' => 'Id Clientes',
            'preco' => 'Preco',
            'estadopedido' => 'Estadopedido',
        ];
    }
}
