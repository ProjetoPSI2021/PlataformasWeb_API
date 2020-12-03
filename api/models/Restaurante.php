<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Restaurante".
 *
 * @property int $idRestaurante
 * @property string $nome
 * @property string $morada
 * @property resource|null $imagem
 * @property int $salas
 * @property int $mesas
 */
class Restaurante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Restaurante';
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
            'idRestaurante' => 'Id Restaurante',
            'nome' => 'Nome',
            'morada' => 'Morada',
            'imagem' => 'Imagem',
            'salas' => 'Salas',
            'mesas' => 'Mesas',
        ];
    }
}
