<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Product_Specs extends Model
{
    private int $specs_id;
    private int $product_id;
    private $value;

    public function getSpecs_id()
    {
        return $this->specs_id;
    }


    public function setSpecs_id($specs_id)
    {
        $this->specs_id = $specs_id;

        return $this;
    }

 
    public function getProduct_id()
    {
        return $this->product_id;
    }


    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }


    public function getValue()
    {
        return $this->value;
    }


    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
