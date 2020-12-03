<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cliente".
 *
 * @property int $idCliente
 * @property string $username
 * @property string $primeiroNome
 * @property string $ultimoNome
 * @property string $morada
 * @property string $password
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'primeiroNome', 'ultimoNome', 'morada', 'password'], 'required'],
            [['username', 'primeiroNome', 'ultimoNome', 'morada', 'password'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'username' => 'Username',
            'primeiroNome' => 'Primeiro Nome',
            'ultimoNome' => 'Ultimo Nome',
            'morada' => 'Morada',
            'password' => 'Password',
        ];
    }
}
