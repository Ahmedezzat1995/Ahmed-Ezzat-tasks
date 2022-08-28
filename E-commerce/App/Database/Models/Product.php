<?php

namespace App\Database\Models;

use App\Database\Models\Contract\CRUD;
use App\Database\Models\Contract\Model;

class Product extends Model implements CRUD
{

    private int $id;
    private string $name_ar;
    private string $name_en;
    private string $image;
    private int $quantity;
    private int $price;
    private bool $status;
    private string $details_en;
    private string $details_ar;
    private int $sub_catogry_id;
    private int $brand_id;

   
   public function create()
   {
    
   }
    
    //read all products    
    public function read()
    {
        $quary= "SELECT id,name_en,image,price,details_en from products where status= 1 " ;
        return  $this->conn->query($quary) ;
     
    }

    
//read products by brand
public function read_products_by_brand($brand_id)
{
    $quary="SELECT id,name_en,image,price,details_en from products where status= 1 and brand_id = ? ";
    $stmt=$this->conn->prepare($quary);
    $stmt->bind_param('i',$brand_id);
    $stmt->execute();
    return $stmt->get_result();

}


//read products by subcategory
public function read_products_by_subcategory($subcategory_id)
{
    $quary="SELECT id,name_en,image,price,details_en from products where status= 1 and sub_catogrie_id = ? ";
    $stmt=$this->conn->prepare($quary);
    $stmt->bind_param('i',$subcategory_id);
    $stmt->execute();
    return $stmt->get_result();

}

//read products by category
public function read_products_by_category($category_id)
{
    $quary="SELECT id,name_en,image,price,details_en from products_details where status= 1 and catogery_id = ? ";
    $stmt=$this->conn->prepare($quary);
    $stmt->bind_param('i',$category_id);
    $stmt->execute();
    return $stmt->get_result();

}

//read specific products 
public function read_specific_product($product_id)
{
    $quary="SELECT * from products_details where status= 1 and id = ? ";
    $stmt=$this->conn->prepare($quary);
    $stmt->bind_param('i',$product_id);
    $stmt->execute();
    return $stmt->get_result();

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


    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

 
    public function getDetails_en()
    {
        return $this->details_en;
    }


    public function setDetails_en($details_en)
    {
        $this->details_en = $details_en;

        return $this;
    }
 
    public function getDetails_ar()
    {
        return $this->details_ar;
    }


    public function setDetails_ar($details_ar)
    {
        $this->details_ar = $details_ar;

        return $this;
    }


    public function getSub_catogry_id()
    {
        return $this->sub_catogry_id;
    }


    public function setSub_catogry_id($sub_catogry_id)
    {
        $this->sub_catogry_id = $sub_catogry_id;

        return $this;
    }


    public function getBrand_id()
    {
        return $this->brand_id;
    }


    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }
}
