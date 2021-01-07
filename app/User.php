<?php
class User {

    public $username;
    public $email;


    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getEmailVariables()
    {
        return [
          'username' => $this->getUsername(),
            'email' => $this->getEmail(),
        ];
    }
}