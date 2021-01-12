<?php

use backend\models\User;
class ModeloUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests


    public function testUserValido()
    {
        $p = new User();

        $p->username = "testes";
        $p->password_hash = "pass123";
        //Supostamente password é hash
        $p->email = "testestestes@gmail.com";
        $p->restauranteid ="1";
        $p->status ="10";

        $this->assertTrue($p->validate(),json_encode($p->errors));
    }

    public function testUserRestauranteIdInvalido()
    {
        $p = new User();

        $p->username = "testes";
        $p->password_hash = "pass123";
        //Supostamente password é hash
        $p->email = "testestestes@gmail.com";
        $p->restauranteid ="abc";
        $p->status ="10";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testUserRestauranteStatusInvalido()
    {
        $p = new User();

        $p->username = "testes";
        $p->password_hash = "pass123";
        //Supostamente password é hash
        $p->email = "testestestes@gmail.com";
        $p->restauranteid ="1";
        $p->status ="abc";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testUserUsernameVazio()
    {
        $p = new User();

        $p->username = "";
        $p->password_hash = "pass123";
        //Supostamente password é hash
        $p->email = "testestestes@gmail.com";
        $p->restauranteid ="1";
        $p->status ="10";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }


    public function testUserEmailVazio()
    {
        $p = new User();

        $p->username = "testes";
        $p->password_hash = "pass123";
        //Supostamente password é hash
        $p->email = "";
        $p->restauranteid ="1";
        $p->status ="10";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testUserEmailInvalido()
    {
        $p = new User();

        $p->username = "testes";
        $p->password_hash = "pass123";
        //Supostamente password é hash
        $p->email = "aasd";
        $p->restauranteid ="1";
        $p->status ="10";

        $this->assertFalse($p->validate(),json_encode($p->errors));
        $p->email = "aasd@asd";
        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testUserPasswordVazia()
    {
        $p = new User();

        $p->username = "testes";
        $p->password_hash = "";
        //Supostamente password é hash
        $p->email = "";
        $p->restauranteid ="1";
        $p->status ="10";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testAddUserBd()
    {
        $this->tester->cantSeeRecord(User::class,['username'=>'testes']);

        $p = new User();

        $p->username = "testes";
        $p->password_hash = "pass123";
        $p->auth_key = "FJ05OrX9YMpbXgv--bhQAXsayrhalFVy";
        $p->created_at = "1602015953";
        $p->updated_at ="1602015953";
        //Supostamente password é hash
        $p->email = "testestestes@gmail.com";
        $p->restauranteid ="1";
        $p->status ="10";
        $p->save();

        $this->tester->seeRecord(User::class,['username'=>'testes']);
        $this->assertTrue($p->validate(),json_encode($p->errors));
    }



}