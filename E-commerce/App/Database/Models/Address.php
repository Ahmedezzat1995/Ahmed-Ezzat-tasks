<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Address extends Model
{
    private int $id;
    private string $street;
    private int $builiding;
    private int $floor;
    private int $flat;
    private string $notes;
    private int $regoin_id;
    private int $user_id;





    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getStreet()
    {
        return $this->street;
    }


    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }


    public function getBuiliding()
    {
        return $this->builiding;
    }


    public function setBuiliding($builiding)
    {
        $this->builiding = $builiding;

        return $this;
    }


    public function getFloor()
    {
        return $this->floor;
    }


    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }


    public function getFlat()
    {
        return $this->flat;
    }


    public function setFlat($flat)
    {
        $this->flat = $flat;

        return $this;
    }


    public function getNotes()
    {
        return $this->notes;
    }


    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }


    public function getRegoin_id()
    {
        return $this->regoin_id;
    }


    public function setRegoin_id($regoin_id)
    {
        $this->regoin_id = $regoin_id;

        return $this;
    }


    public function getUser_id()
    {
        return $this->user_id;
    }


    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}
