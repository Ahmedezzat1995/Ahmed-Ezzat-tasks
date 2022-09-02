<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Order_Product extends Model
{

    private int $product_id;
    private int $order_id;
    private int $quantity;
    private int $price;


    public function getProduct_id()
    {
        return $this->product_id;
    }


    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getOrder_id()
    {
        return $this->order_id;
    }


    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }


    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
