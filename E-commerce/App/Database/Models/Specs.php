<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Specs extends Model
{
    private int $id;
    private string $name;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
