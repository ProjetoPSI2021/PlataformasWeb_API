<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idCliente
 * @property string $Nome
 * @property string $Morada
 * @property string $Contacto
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Morada', 'Contacto'], 'required'],
            [['Nome', 'Morada', 'Contacto'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'Nome' => 'Nome',
            'Morada' => 'Morada',
            'Contacto' => 'Contacto',
        ];
    }
}
