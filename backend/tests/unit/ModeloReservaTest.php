<?php

use backend\models\Reserva;
class ModeloReservaTest extends \Codeception\Test\Unit
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


    public function testReservaValido()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertTrue($p->validate(),json_encode($p->errors));
    }

    public function testReservaIdClienteVazio()
    {
        $p = new Reserva();

        $p->id_cliente = "";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaIdRestauranteVazio()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaDataVazio()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaHoraVazio()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaTipoVazio()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaNpessoasVazio()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaQuartosVazio()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaTipoIdClienteInvalido()
    {
        $p = new Reserva();

        $p->id_cliente = "a";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaTipoIdRestauranteInvalido()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "a";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaTipoNpessoasInvalido()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "a";
        $p->quartos = "1";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testReservaTipoQuartosInvalido()
    {
        $p = new Reserva();

        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "1";
        $p->quartos = "a";

        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testAddReservaValidaBD()
    {
        $this->tester->cantSeeRecord(Reserva::class,['idreservas'=>'2']);

        $p = new Reserva();
        $p->idreservas = "2";
        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";
        $p->save();


        $this->tester->seeRecord(Reserva::class,['idreservas'=>'2']);

        $this->assertTrue($p->validate());
    }

    public function testUpdateReservaValidaBD()
    {
        $this->tester->cantSeeRecord(Reserva::class,['idreservas'=>'2']);

        $p = new Reserva();
        $p->idreservas = "2";
        $p->id_cliente = "1";
        $p->id_restaurante = "1";
        $p->data = "2020-11-18";
        $p->hora = "21:30:00";
        $p->tipo = "Normal";
        $p->npessoas = "5";
        $p->quartos = "1";
        $p->save();

        $alvo = Reserva::findOne((['idreservas' => '2']));
        $alvo->npessoas="20";
        $alvo->save();

        $this->tester->seeRecord(Reserva::class,['npessoas'=>'20']);
        $this->tester->cantSeeRecord(Reserva::class,['npessoas'=>'5']);

        $this->assertTrue($p->validate());
    }


}