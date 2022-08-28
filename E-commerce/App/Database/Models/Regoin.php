<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Regoin extends Model
{

    private int $id;
    private string $name_ar;
    private string $name_en;
    private bool $status;
    private int $citiy_id;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getName_ar()
    {
        return $this->name_ar;
    }


    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    public function getName_en()
    {
        return $this->name_en;
    }


    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

 
    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getCitiy_id()
    {
        return $this->citiy_id;
    }


    public function setCitiy_id($citiy_id)
    {
        $this->citiy_id = $citiy_id;

        return $this;
    }
}
