<?php

use backend\models\Cliente;

use _generated\UnitTesterActions;
class ModeloClienteTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        //ja a dar
    }

    protected function _after()
    {
    }



    // tests
    public function testClienteValido()
    {
       $p = new Cliente();

       $p->username = "testebd123";
       $p->email = "testestestes@gmail.com";
       $p->password ="testepass";

       $this->assertTrue($p->validate());
    }

    public function testClienteEmailInvalido()
    {
        $p = new Cliente();

        $p->username = "adar12";
        $p->email = "testestestesgmail.com";
        //Email sem arroba
        $p->password ="testepass";

        $this->assertFalse($p->validate());

        $p->email = "";
        $this->assertFalse($p->validate(), json_encode($p->errors));

        $p->email = "x@x";
        $this->assertFalse($p->validate());

    }

    public function testClienteUsernameComprido()
    {
        $p = new Cliente();

        $p->username = "123980213093728139287378129839721897132789132891732781392879123781293138927129837897312783921987123987213987321987213789213987321987231789312987123978321231978319278932187391827981237981237389172892371839721897";
        $p->email = "testesteste@sgmail.com";

        $p->password ="testepass";
        $this->assertFalse($p->validate(), "O campo username é demasiado comprido");
    }

    public function testClienteUsernameValido()
    {
        $p = new Cliente();

        $p->username = "abcde12345abcde12345abcde12345abcde12345abcde12345";
        //Contem 50 digitos
        $p->email = "testesteste@sgmail.com";

        $p->password ="testepass";

        $this->assertTrue($p->validate(),  json_encode($p->errors));
    }

    public function testClienteUsernameVazio()
    {
        $p = new Cliente();

        $p->username = "";
        $p->email = "testesteste@sgmail.com";

        $p->password ="testepass";
        $this->assertFalse($p->validate(), "O campo username está vazio");
    }

    public function testClientePasswordVazia()
    {
        $p = new Cliente();

        $p->password = "";
        $p->email = "testesteste@sgmail.com";

        $p->username ="teste";
        $this->assertFalse($p->validate(), "O campo password está vazio");
    }

    public function testClientePasswordComprida()
    {
        $p = new Cliente();

        $p->password = "abcde12345abcde12345abcde12345abcde12345abcde123456";

        $this->assertFalse($p->validate(), "O campo password excedeu o limite de caracteres(50)");
    }

     public function testAddClienteValidoBD()
    {
        $this->tester->cantSeeRecord(Cliente::class,['username'=>'testebd123']);

        $p = new Cliente();

        $p->username = "testebd123";
        $p->email = "testestestes@gmail.com";
        $p->password ="testepass";
        $p->save();

        $this->tester->seeRecord(Cliente::class,['username'=>'testebd123']);

        $this->assertTrue($p->validate());
    }

    public function testUpdateClienteValidoBD()
    {
        $this->tester->cantSeeRecord(Cliente::class,['username'=>'testebd123']);

        $p = new Cliente();

        $p->username = "testebd123";
        $p->email = "testestestes@gmail.com";
        $p->password ="testepass";
        $p->save();

        $alvo = Cliente::findOne((['username' => 'testebd123']));
        $alvo->username="testeupdate123";
        $alvo->save();

        $this->tester->seeRecord(Cliente::class,['username'=>'testeupdate123']);
        $this->tester->cantSeeRecord(Cliente::class,['username'=>'testebd123']);

        $this->assertTrue($p->validate());
    }

}