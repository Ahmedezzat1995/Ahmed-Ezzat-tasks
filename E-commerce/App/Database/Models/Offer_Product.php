<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Offer_Product extends Model 
{
    private int $product_id;
    private int $offer_id;
    private int $price_after_discount;


    public function getProduct_id()
    {
        return $this->product_id;
    }


    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }


    public function getOffer_id()
    {
        return $this->offer_id;
    }


    public function setOffer_id($offer_id)
    {
        $this->offer_id = $offer_id;

        return $this;
    }


    public function getPrice_after_discount()
    {
        return $this->price_after_discount;
    }


    public function setPrice_after_discount($price_after_discount)
    {
        $this->price_after_discount = $price_after_discount;

        return $this;
    }
}
