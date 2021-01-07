<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class MeuRestauranteAdminCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */

    public function loginUseradmin(FunctionalTester $I)
    {
        $I->amOnPage('advanced1/backend/web/index.php?r=site%2Flogin');
        $I->see('Sign in to start your session');
        $I->fillField('Username', 'adminapi');
        $I->fillField('Password', 'adminapi');
        $I->click('Login');
        $I->wait(10);
        $I->saveSessionSnapshot('loginUseradmin');
    }

    public function dashboardUserAdmin(FunctionalTester $I)
    {
        $I->loadSessionSnapshot('loginUseradmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->wait(5);
        $I->see('adminapi');
        $I->see('Dashboard Admin');
    }

    public function pedidosUseradmin(FunctionalTester $I)
    {
        $I->loadSessionSnapshot('loginUseradmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->wait(5);
        $I->click('Meu Restaurante');
        $I->wait(5);
        $I->click('Pedidos');
        $I->wait(5);
        $I->see('Criar Pedido');
    }

    public function comidaUseradmin(FunctionalTester $I)
    {
        $I->loadSessionSnapshot('loginUseradmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->wait(5);
        $I->click('Meu Restaurante');
        $I->wait(5);
        $I->click('Comida');
        $I->wait(5);
        $I->see('Criar Prato');
    }

    public function reservaUseradmin(FunctionalTester $I)
    {
        $I->loadSessionSnapshot('loginUseradmin');
        $I->amOnPage('advanced1/backend/web/index.php');
        $I->wait(5);
        $I->click('Meu Restaurante');
        $I->wait(5);
        $I->click('Reservas');
        $I->wait(5);
        $I->see('Criar Reserva');
    }

}
