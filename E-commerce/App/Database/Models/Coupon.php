<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Coupon extends Model
{

    private int $id;
    private int $code;
    private string $discount_type;
    private int $max_discount_value;
    private int $max_usage;
    private int $max_usage_per_user;
    private $mini_order;
    private $start_at;
    private $end_at;

 
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getCode()
    {
        return $this->code;
    }


    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getDiscount_type()
    {
        return $this->discount_type;
    }


    public function setDiscount_type($discount_type)
    {
        $this->discount_type = $discount_type;

        return $this;
    }

    
    public function getMax_discount_value()
    {
        return $this->max_discount_value;
    }

    
    public function setMax_discount_value($max_discount_value)
    {
        $this->max_discount_value = $max_discount_value;

        return $this;
    }

    
    public function getMax_usage()
    {
        return $this->max_usage;
    }

    
    public function setMax_usage($max_usage)
    {
        $this->max_usage = $max_usage;

        return $this;
    }

 
    public function getMax_usage_per_user()
    {
        return $this->max_usage_per_user;
    }


    public function setMax_usage_per_user($max_usage_per_user)
    {
        $this->max_usage_per_user = $max_usage_per_user;

        return $this;
    }


    public function getMini_order()
    {
        return $this->mini_order;
    }


    public function setMini_order($mini_order)
    {
        $this->mini_order = $mini_order;

        return $this;
    }


    public function getStart_at()
    {
        return $this->start_at;
    }


    public function setStart_at($start_at)
    {
        $this->start_at = $start_at;

        return $this;
    }


    public function getEnd_at()
    {
        return $this->end_at;
    }


    public function setEnd_at($end_at)
    {
        $this->end_at = $end_at;

        return $this;
    }
}
