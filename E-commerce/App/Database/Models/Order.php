<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Order extends Model
{

    private int $id;
    private int $total_price;
    private bool $status;
    private $delvierd_at;
    private int $address_id;
    private int $coupon_id;

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getTotal_price()
    {
        return $this->total_price;
    }


    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;

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


    public function getDelvierd_at()
    {
        return $this->delvierd_at;
    }


    public function setDelvierd_at($delvierd_at)
    {
        $this->delvierd_at = $delvierd_at;

        return $this;
    }

    public function getAddress_id()
    {
        return $this->address_id;
    }


    public function setAddress_id($address_id)
    {
        $this->address_id = $address_id;

        return $this;
    }
 
    public function getCoupon_id()
    {
        return $this->coupon_id;
    }


    public function setCoupon_id($coupon_id)
    {
        $this->coupon_id = $coupon_id;

        return $this;
    }
}
