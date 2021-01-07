<?php 
class ContasTest extends \Codeception\Test\Unit
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
    public function testSoma()
    {
        $c = new Calculadora();

        $this->assertEquals(5,$c->somar(2,3));
    }
}