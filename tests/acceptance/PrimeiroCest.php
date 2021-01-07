<?php 

class PrimeiroCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function paginaInicial(AcceptanceTester $I)
    {
        $I->amOnPage('http://localhost/advanced1/backend/web/index.php?r=site%2Flogin');
        $I->see('Sign in to start your session');
    }
}
