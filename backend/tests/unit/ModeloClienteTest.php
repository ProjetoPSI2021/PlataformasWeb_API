<?php

use backend\models\Cliente;
class ModeloClienteTest extends \Codeception\Test\Unit
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
    public function testClienteValido()
    {
       $p = new Cliente();

       $p->username = "testes";
       $p->email = "testestestes@gmail.com";
       $p->password ="testepass";

       $this->assertTrue($p->validate());
    }
}