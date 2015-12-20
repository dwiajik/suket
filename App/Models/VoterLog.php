<?php

namespace App\Models;

class VoterLog
{
    private $id;
    private $timestamp;
    private $voterId;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}