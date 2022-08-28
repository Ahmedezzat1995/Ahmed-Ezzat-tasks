<?php

namespace App\Database\Models;

use App\Database\Models\Contract\CRUD;
use App\Database\Models\Contract\Model;

class Catogery extends Model implements CRUD
{
    private int $id;
    private string $name_ar;
    private string $name_en;
    private string $image;
    private bool $status;
    



    public function create()
    {

    }

 // read catogery 
    public function read()
    {
        $quary = " SELECT * from catogries where status  = 1"  ;
        return  $this->conn->query($quary);
    }

    public function update()
    {
    }

    public function delete()
    {
    }



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


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;

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
}
