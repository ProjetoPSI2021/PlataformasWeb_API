<?php 

class PrimeiroCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function LoginValidacao(AcceptanceTester $I)
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

    public function InicialLoginAdmin(AcceptanceTester $I)
    {
        $I->amOnPage('advanced1/backend/web/index.php?r=site%2Flogin');
        $I->see('Sign in to start your session');
        $I->fillField('Username', 'adminapi');
        $I->fillField('Password', 'adminapi');
        $I->wait(10);
        $I->click("Login");
        $I->wait(5);
        $I->see("Bem-Vindo adminapi!");
        $I->saveSessionSnapshot('paginaInicialLoginAdmin');
    }

    public function CriarClienteValidacaoAdmin(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginAdmin');
        $I->click("Dashboard Admin");
        $I->click("Clientes");
        $I->wait(5);
        $I->click("Criar Cliente");
        $I->wait(2);
        $I->click("Save");
        $I->wait(5);
        $I->see("Username cannot be blank.");
        $I->see("Email cannot be blank.");
        $I->see("Password cannot be blank.");

    }

    public function CriarPedidoValidacaoAdmin(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginAdmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->click("Dashboard Admin");
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

    public function CriarPratoValidacaoAdmin(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginAdmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->click("Dashboard Admin");
        $I->wait(5);
        $I->click("Ementa");
        $I->wait(5);
        $I->click("Criar Prato");
        $I->wait(2);
        $I->click("Save");
        $I->wait(5);
        $I->see("Nome cannot be blank.");
        $I->see("Tipo cannot be blank.");
        $I->see("ID Restaurante cannot be blank.");
        $I->see("Preço cannot be blank.");
        $I->see("Ingredientes cannot be blank.");
    }

    public function CriarReservaValidacaoAdmin(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginAdmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->wait(5);
        $I->click("Dashboard Admin");
        $I->wait(5);
        $I->click("Reservas");
        $I->wait(5);
        $I->click("Criar Reserva");
        $I->wait(2);
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

    public function CriarRestauranteValidacaoAdmin(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginAdmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->wait(5);
        $I->click("Dashboard Admin");
        $I->wait(5);
        $I->click("Restaurantes");
        $I->wait(5);
        $I->click("Criar Restaurante");
        $I->wait(2);
        $I->click("Save");
        $I->wait(5);
        $I->see("Nome cannot be blank.");
        $I->see("Morada cannot be blank.");
        $I->see("Salas cannot be blank.");
        $I->see("Mesas cannot be blank.");
    }

    public function CriarUserValidacaoAdmin(AcceptanceTester $I)
    {
        $I->loadSessionSnapshot('paginaInicialLoginAdmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->wait(5);
        $I->click("Dashboard Admin");
        $I->wait(5);
        $I->click("Funcionarios");
        $I->wait(5);
        $I->click("Registar novo utilizador");
        $I->wait(2);
        $I->click("Signup");
        $I->wait(5);
        $I->see("Username cannot be blank.");
        $I->see("Email cannot be blank.");
        $I->see("Password cannot be blank.");
    }
}
