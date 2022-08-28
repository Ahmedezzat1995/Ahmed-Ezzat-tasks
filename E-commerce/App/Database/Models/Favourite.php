<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Favourite extends Model
{

    private int $user_id;
    private int $product_id;


    public function getUser_id()
    {
        return $this->user_id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

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
}
