<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reserva".
 *
 * @property int $idreservas
 * @property int $id_cliente
 * @property int $id_restaurante
 * @property string $data
 * @property string $hora
 * @property string $tipo
 * @property int $npessoas
 * @property int $quartos
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Reserva';
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
            [['tipo'], 'string'],
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
            'idreservas' => 'Idreservas',
            'id_cliente' => 'Id Cliente',
            'id_restaurante' => 'Id Restaurante',
            'data' => 'Data',
            'hora' => 'Hora',
            'tipo' => 'Tipo',
            'npessoas' => 'Npessoas',
            'quartos' => 'Quartos',
        ];
    }
}
