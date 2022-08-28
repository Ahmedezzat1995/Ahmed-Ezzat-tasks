<?php

namespace App\Database\Models;
use App\Database\Models\Contract\Model;


class Admin extends Model
{

    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $image;
    private string $gender;
    private int $verfication_code;
    private  $expired_at;
    private bool $status;
    private $email_veified_at;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getFirst_name()
    {
        return $this->first_name;
    }


    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }


    public function getLast_name()
    {
        return $this->last_name;
    }


    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

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


    public function getGender()
    {
        return $this->gender;
    }


    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }


    public function getVerfication_code()
    {
        return $this->verfication_code;
    }


    public function setVerfication_code($verfication_code)
    {
        $this->verfication_code = $verfication_code;

        return $this;
    }

    public function getExpired_at()
    {
        return $this->expired_at;
    }


    public function setExpired_at($expired_at)
    {
        $this->expired_at = $expired_at;

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


    public function getEmail_veified_at()
    {
        return $this->email_veified_at;
    }


    public function setEmail_veified_at($email_veified_at)
    {
        $this->email_veified_at = $email_veified_at;

        return $this;
    }
}
