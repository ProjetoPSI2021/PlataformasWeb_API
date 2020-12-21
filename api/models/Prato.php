<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Prato".
 *
 * @property int $idPratos
 * @property int $id_pedidos
 * @property string $nome
 * @property resource $imagem
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
            [['id_pedidos', 'nome', 'imagem', 'tipo', 'r_id', 'r_preco',  'r_ingredientes', 'r_topfood'], 'required'],
            [['id_pedidos', 'r_id'], 'integer'],
            [['imagem', 'tipo'], 'string'],
            [['r_preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['r_ingredientes'], 'string', 'max' => 100],
            [['id_pedidos'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['id_pedidos' => 'idpedido']],
            [['r_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurante::className(), 'targetAttribute' => ['r_id' => 'idRestaurante']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPratos' => 'Id Pratos',
            'id_pedidos' => 'Id Pedidos',
            'nome' => 'Nome',
            'imagem' => 'Imagem',
            'tipo' => 'Tipo',
            'r_id' => 'R ID',
            'r_preco' => 'R Preco',
            'r_ingredientes' => 'R Ingredientes',
        ];
    }
}
