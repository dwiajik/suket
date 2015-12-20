<?php

namespace App\Models;

class Candidate
{
    private $id;
    private $candidateNumber;
    private $name;
    private $photo;
    private $vision;
    private $mission;
    private $votersCount;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}