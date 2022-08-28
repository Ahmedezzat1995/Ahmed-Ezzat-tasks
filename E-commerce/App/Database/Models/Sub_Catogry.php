<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class sub_catogry extends Model
{

    private int $id;
    private string $name_ar;
    private string $name_en;
    private string $photo;
    private bool $status;
    private int $catogery_id;


    // read subcatogery 
    public function read($key)
    {
        $quary = " SELECT * from sub_catogries where status  = 1 and catogery_id=$key"  ;
        return  $this->conn->query($quary);
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


    public function getPhoto()
    {
        return $this->photo;
    }


    public function setPhoto($photo)
    {
        $this->photo = $photo;

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


    public function getCatogery_id()
    {
        return $this->catogery_id;
    }


    public function setCatogery_id($catogery_id)
    {
        $this->catogery_id = $catogery_id;

        return $this;
    }
}
