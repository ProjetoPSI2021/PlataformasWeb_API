<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Prato".
 *
 * @property int $idPratos
 * @property string $nome
 * @property string $imagem
 * @property string $tipo
 * @property int $r_id
 * @property float $r_preco
 * @property string $r_ingredientes
 */
class Prato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Prato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tipo', 'r_id', 'r_preco', 'r_ingredientes'], 'required'],
            [['tipo'], 'string'],
            [['r_id'], 'integer'],
            [['r_preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['imagem'], 'string', 'max' => 200],
            [['r_ingredientes'], 'string', 'max' => 100],
            [['r_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurante::className(), 'targetAttribute' => ['r_id' => 'idRestaurante']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPratos' => 'ID Prato',
            'nome' => 'Nome',
            'imagem' => 'Imagem',
            'tipo' => 'Tipo',
            'r_id' => 'ID Restaurante',
            'r_preco' => 'Preço',
            'r_ingredientes' => 'Ingredientes',
        ];
    }
}
