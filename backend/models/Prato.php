<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prato".
 *
 * @property int $id_pratos
 * @property int $id_pedidos
 * @property string $nome
 * @property resource $imagem
 * @property string $tipo
 * @property int $r_id
 * @property float $r_preco
 * @property float $r_desconto
 * @property string $r_ingredientes
 * @property string $r_topfood
 *
 * @property Pedido $pedido
 */
class Prato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pedidos', 'nome', 'imagem', 'tipo', 'r_id', 'r_preco', 'r_desconto', 'r_ingredientes', 'r_topfood'], 'required'],
            [['id_pedidos','r_id'], 'integer'],
            [['imagem', 'tipo'], 'string'],
            [['r_preco', 'r_desconto'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['r_ingredientes', 'r_topfood'], 'string', 'max' => 100],
            [['id_pedidos'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['id_pedidos' => 'idpedido']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pratos' => 'Id Prato',
            'id_pedidos' => 'Id Pedido',
            'nome' => 'Nome',
            'imagem' => 'Imagem',
            'tipo' => 'Tipo',
            'r_id' => 'R ID',
            'r_preco' => 'R Preco',
            'r_desconto' => 'R Desconto',
            'r_ingredientes' => 'R Ingredientes',
            'r_topfood' => 'R Topfood',
        ];
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasOne(Pedido::className(), ['idpedido' => 'id_pedidos']);
    }
}