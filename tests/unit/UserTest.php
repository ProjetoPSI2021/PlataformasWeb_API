<?php

class UserTest extends \Codeception\Test\Unit
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
    public function testGetUsername()
    {
        $user = new User();

        $user->setUsername('Pedro');

        $this->assertEquals($user->getUsername(), 'Pedro');
    }

    public function testGetEmail()
    {
        $user = new User();

        $user->setEmail('testeemail@gmail.com');

        $this->assertEquals($user->getEmail(), 'testeemail@gmail.com');
    }

    public function testEmailVariablesContainCorrectValues(){
            $user = new User();
            $user->setUsername('Pedro');
            $user->setEmail('testeemail@gmail.com');

            $emailVariables = $user->getEmailVariables();

            $this->assertArrayHasKey('username', $emailVariables);
            $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['username'], 'Pedro');
        $this->assertEquals($emailVariables['email'], 'testeemail@gmail.com');


    }
}