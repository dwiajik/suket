<?php

namespace App\Models;

class UserLog
{
    private $id;
    private $timestamp;
    private $userId;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}