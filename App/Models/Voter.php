<?php

namespace App\Models;

class Voter
{
    private $id;
    private $username;
    private $password;
    private $identityNumber;
    private $fullname;
    private $hasVote;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}