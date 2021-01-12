<?php 

class UserFormsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function InicialValidacaoUser(AcceptanceTester $I)
    {
        $I->amOnPage('advanced1/backend/web/index.php?r=site%2Flogin');
        $I->see('Sign in to start your session');
        $I->fillField('Username', ' ');
        $I->fillField('Password', ' ');
        $I->fillField('Username', ' ');
        $I->wait(10);
        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    public function InicialLoginUser(AcceptanceTester $I)
    {
        $I->amOnPage('advanced1/backend/web/index.php?r=site%2Flogin');
        $I->see('Sign in to start your session');
        $I->fillField('Username', 'jose1234');
        $I->fillField('Password', 'jose1234');
        $I->wait(10);
        $I->click("Login");
        $I->wait(5);
        $I->see("Bem-Vindo jose1234!");
        $I->saveSessionSnapshot('paginaInicialLoginUser');
    }

    public function CriarPedidoValidacaoUser(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginUser');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->click("Restaurante");
        $I->click("Pedidos");
        $I->wait(5);
        $I->click("Criar Pedido");
        $I->wait(2);
        $I->click("Save");
        $I->wait(5);
        $I->see("ID Restaurante cannot be blank.");
        $I->see("Tipo cannot be blank.");
        $I->see("Estado cannot be blank.");
        $I->see("ID Cliente cannot be blank.");
        $I->see("Preço cannot be blank.");

    }

    public function CriarPratoValidacaoUser(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginUser');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->click("Restaurante");
        $I->click("Comida");
        $I->wait(5);
        $I->click("Criar Prato");
        $I->wait(5);
        $I->click("Save");
        $I->wait(5);
        $I->see("Nome cannot be blank.");
        $I->see("Tipo cannot be blank.");
        $I->see("ID Restaurante cannot be blank.");
        $I->see("Preço cannot be blank.");
        $I->see("Ingredientes cannot be blank.");
    }

    public function CriarReservaValidacaoUser(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginUser');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->click("Restaurante");
        $I->wait(5);
        $I->click("Reservas");
        $I->wait(5);
        $I->click("Criar Reserva");
        $I->wait(5);
        $I->click("Save");
        $I->wait(5);
        $I->see("ID Cliente cannot be blank.");
        $I->see("ID Restaurante cannot be blank.");
        $I->see("Data cannot be blank.");
        $I->see("Hora cannot be blank.");
        $I->see("Tipo cannot be blank.");
        $I->see("Nº Pessoas cannot be blank.");
        $I->see("Sala cannot be blank.");
    }


}
