<?php 

class TesteCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['http://localhost/advanced1/backend/web/index.php?r=site%2Flogin']);
    }



    public function openPage(FunctionalTester $I)
    {
        $I->see('Sign in to start your session');
    }
}
