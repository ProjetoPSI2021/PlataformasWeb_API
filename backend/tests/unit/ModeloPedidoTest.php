<?php

use backend\models\Pedido;
class ModeloPedidoTest extends \Codeception\Test\Unit
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
    public function testPedidoValido()
{
    $p = new Pedido();

    $p->tipo = "Takeaway";
    $p->estadopedido = "Pendente";
    $p->id_clientes = "1";
    $p->id_reserva = "1";
    $p->data = "2021-01-01 01:00:00";
    $p->preco = "10";
    $p->idrestaurantepedido = "1";


    $this->assertTrue($p->validate(),json_encode($p->errors));
}

    public function testPedidoTipoVazio()
    {
        $p = new Pedido();

        $p->tipo = "";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "1";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoIdClienteVazio()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "1";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoPrecoVazio()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "";
        $p->idrestaurantepedido = "1";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoIdRestaurantePedidoVazio()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoIdReservaTipoInvalido()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "d";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "1";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoIdPratoOrderTipoInvalido()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->idpratoorder="teste";
        $p->preco = "10";
        $p->idrestaurantepedido = "1";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoIdClienteTipoInvalido()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "asd";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "1";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoIdRestaurantePedidoTipoInvalido()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "asd";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testPedidoPrecoTipoInvalido()
    {
        $p = new Pedido();

        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "asd";
        $p->idrestaurantepedido = "1";


        $this->assertFalse($p->validate(),json_encode($p->errors));
    }

    public function testAddPedidoValidoBD()
    {
        $this->tester->cantSeeRecord(Pedido::class,['idpedido'=>'1']);

        $p = new Pedido();
        $p->idpedido = "1";
        $p->estadopedido = "Pendente";
        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "1";
        $p->save();

        $this->tester->seeRecord(Pedido::class,['idpedido'=>'1']);

        $this->assertTrue($p->validate());
    }

    public function testUpdatePedidoValidoBD()
    {
        $this->tester->cantSeeRecord(Pedido::class,['idpedido'=>'1']);

        $p = new Pedido();
        $p->idpedido = "1";
        $p->estadopedido = "Pendente";
        $p->tipo = "Takeaway";
        $p->id_clientes = "1";
        $p->id_reserva = "1";
        $p->data = "2021-01-01 01:00:00";
        $p->preco = "10";
        $p->idrestaurantepedido = "1";
        $p->save();

        $alvo = Pedido::findOne((['idpedido' => '1']));
        $alvo->preco="20";
        $alvo->save();

        $this->tester->seeRecord(Pedido::class,['preco'=>'20']);
        $this->tester->cantSeeRecord(Pedido::class,['preco'=>'10']);

        $this->assertTrue($p->validate());
    }



}