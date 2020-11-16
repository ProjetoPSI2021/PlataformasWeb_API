<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "restaurantes".
 *
 * @property int $idRestaurante
 * @property string $nome
 * @property string $morada
 * @property resource $imagem
 * @property int $salas
 * @property int $mesas
 *
 * @property Reservas[] $reservas
 */
class Restaurantes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurantes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'morada', 'salas', 'mesas'], 'required'],
            [['imagem'], 'string'],
            [['salas', 'mesas'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['morada'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRestaurante' => 'ID Restaurante',
            'nome' => 'Nome',
            'morada' => 'Morada',
            'imagem' => 'Imagem',
            'salas' => 'Salas',
            'mesas' => 'Mesas',
        ];
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::className(), ['id_restaurante' => 'idRestaurante']);
    }
}
