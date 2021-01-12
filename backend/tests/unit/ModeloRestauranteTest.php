<?php

use backend\models\Restaurante;
class ModeloRestauranteTest extends \Codeception\Test\Unit
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
    public function testRestauranteValido()
    {
        $p = new Restaurante();

        $p->nome = "Restaurante X";
        $p->morada = "Morada X";
        $p->imagem = "rest_1";
        $p->salas = "12";
        $p->mesas = "11";
        $p->telefone = "918293819";




        $this->assertTrue($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteNomeVazio()
    {
        $p = new Restaurante();

        $p->nome = "";
        $p->morada = "Morada X";
        $p->imagem = "rest_1";
        $p->salas = "12";
        $p->mesas = "11";
        $p->telefone = "918293819";




        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteMoradaVazia()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "";
        $p->imagem = "rest_1";
        $p->salas = "12";
        $p->mesas = "11";
        $p->telefone = "918293819";




        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteSalaVazia()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "Rest Morada";
        $p->imagem = "rest_1";
        $p->salas = "";
        $p->mesas = "11";
        $p->telefone = "918293819";




        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteMesaVazia()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "Rest Morada";
        $p->imagem = "rest_1";
        $p->salas = "11";
        $p->mesas = "";
        $p->telefone = "918293819";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteTipoSalasInvalido()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "Rest Morada";
        $p->imagem = "rest_1";
        $p->salas = "teste";
        $p->mesas = "11";
        $p->telefone = "918293819";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteTipoMesasInvalido()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "Rest Morada";
        $p->imagem = "rest_1";
        $p->salas = "11";
        $p->mesas = "abc";
        $p->telefone = "918293819";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteTipoTelefoneInvalido()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "Rest Morada";
        $p->imagem = "rest_1";
        $p->salas = "11";
        $p->mesas = "11";
        $p->telefone = "abc";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteTipoMoradaComprida()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "abcde12345abcde12345abcde12345abcde12345abcde123456";
        $p->imagem = "rest_1";
        $p->salas = "11";
        $p->mesas = "11";
        $p->telefone = "244938293";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testRestauranteTipoNomeComprido()
    {
        $p = new Restaurante();

        $p->nome = "Rest";
        $p->morada = "abcde12345abcde12345abcde12345abcde12345abcde123456abcde12345abcde12345abcde12345abcde12345abcde123456";
        $p->imagem = "rest_1";
        $p->salas = "11";
        $p->mesas = "11";
        $p->telefone = "244938293";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testAddRestauranteValidoBD()
    {
        $this->tester->cantSeeRecord(Restaurante::class,['idRestaurante'=>'5']);

        $p = new Restaurante();
        $p->idRestaurante = "5";
        $p->nome = "Restaurante X";
        $p->morada = "Morada X";
        $p->imagem = "rest_1";
        $p->salas = "12";
        $p->mesas = "11";
        $p->telefone = "918293819";
        $p->save();


        $this->tester->seeRecord(Restaurante::class,['idRestaurante'=>'5']);

        $this->assertTrue($p->validate());
    }

    public function testUpdateRestauranteValidoBD()
    {
        $this->tester->cantSeeRecord(Restaurante::class,['idRestaurante'=>'5']);

        $p = new Restaurante();
        $p->idRestaurante = "5";
        $p->nome = "Restaurante X";
        $p->morada = "Morada X";
        $p->imagem = "rest_1";
        $p->salas = "12";
        $p->mesas = "11";
        $p->telefone = "918293819";
        $p->save();

        $alvo = Restaurante::findOne((['idRestaurante' => '5']));
        $alvo->mesas="20";
        $alvo->save();

        $this->tester->seeRecord(Restaurante::class,['mesas'=>'20']);
        $this->tester->cantSeeRecord(Restaurante::class,['mesas'=>'11']);

        $this->assertTrue($p->validate());
    }

}