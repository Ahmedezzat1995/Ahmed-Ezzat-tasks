<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class Offer extends Model
{

    private int  $id;
    private string $title;
    private string $image;
    private int $discount;
    private string $discount_type;
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


    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        $this->title = $title;

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

 
    public function getDiscount()
    {
        return $this->discount;
    }

    
    public function setDiscount($discount)
    {
        $this->discount = $discount;

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
