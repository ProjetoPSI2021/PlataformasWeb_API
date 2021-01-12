<?php

use backend\models\Prato;
class ModeloPratoTest extends \Codeception\Test\Unit
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


    public function testPratoValido()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertTrue($p->validate(),json_encode($p->errors));
    }

    public function testPratoNomeVazio()
    {
        $p = new Prato();

        $p->nome = "";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPratoTipoVazio()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPratoRestauranteIdVazio()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPratoPrecoVazio()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPratoIngredientesVazio()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }


    public function testPratoTipoRestauranteIdInvalido()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "abc";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPratoTipoPrecoInvalido()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "abc";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPratoNomeComprido()
    {
        $p = new Prato();

        $p->nome = "abcde12345abcde12345abcde12345abcde12345abcde123456";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPratoIngredientesComprido()
    {
        $p = new Prato();

        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "abcde12345abcde12345abcde12345abcde12345abcde12345abcde12345abcde12345abcde12345abcde12345abcde123456";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testAddPratoValidoBD()
    {
        $this->tester->cantSeeRecord(Prato::class,['idPratos'=>'1']);

        $p = new Prato();
        $p->idPratos = "1";
        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";
        $p->save();


        $this->tester->seeRecord(Prato::class,['idPratos'=>'1']);

        $this->assertTrue($p->validate());
    }

    public function testUpdatePratoValidoBD()
    {
        $this->tester->cantSeeRecord(Prato::class,['idPratos'=>'1']);

        $p = new Prato();
        $p->idPratos = "1";
        $p->nome = "Sushi";
        $p->imagem = "food_1";
        $p->tipo = "Japones";
        $p->r_id = "1";
        $p->r_preco = "10";
        $p->r_ingredientes = "Salmão e atum";
        $p->save();

        $alvo = Prato::findOne((['idPratos' => '1']));
        $alvo->r_preco="20";
        $alvo->save();

        $this->tester->seeRecord(Prato::class,['r_preco'=>'20']);
        $this->tester->cantSeeRecord(Prato::class,['r_preco'=>'10']);

        $this->assertTrue($p->validate());
    }


}