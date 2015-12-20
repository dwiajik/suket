<?php

namespace App\Models;

class Config
{
    private $votingName;
    private $colorTheme;
    private $logo;
    private $bgLogin;
    private $bgVote;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}