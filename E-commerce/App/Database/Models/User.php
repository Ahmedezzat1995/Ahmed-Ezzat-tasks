<?php

namespace App\Database\Models;

use App\Database\Models\Contract\Model;

class User extends Model
{

    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $gender;
    private int $phone;
    private int $verification_code;
    private $expired_at;
    private bool $status;
    private $verified_at;
    private string $photo;

 //Create user
 public function create ()
 {
    $query= "INSERT INTO users (first_name,last_name,email,phone,gender,user_password,verification_code)
     VALUES (?,?,?,?,?,?,?)";
     $stmt=$this->conn->prepare($query);
     $stmt->bind_param("sssissi",$this->first_name,$this->last_name,$this->email,$this->phone,$this->gender,
     $this->password,$this->verification_code);
     return $stmt->execute();
    }

   // check the verfication code by user email
    public function checkCode()
    {
        $query = "SELECT * FROM users WHERE email = ? AND verification_code = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si',$this->email,$this->verification_code);
        $stmt->execute();
        return $stmt->get_result();
    }

 // set email_verified_at time after check verificarion code
    public function makeUserVerified()
    {
        $query = "UPDATE users SET verified_at = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$this->verified_at,$this->email);
        return $stmt->execute();
    }


    public function userexists()
   {
      $query = "select * from users where email= ? and password = ?";
      $stat=$this->conn->prepare($query);
      $stat->bind_param('s','s',$this->email,$this->password);
      return $stat->execute();  
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
        $this->password = password_hash($password,PASSWORD_BCRYPT) ;

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

    public function getPhone()
    {
        return $this->phone;
    }

 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
 
    public function getVerification_code()
    {
        return $this->verification_code;
    }

    
    public function setVerification_code($verification_code)
    {
        $this->verification_code = $verification_code;

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

    
    public function getVerified_at()
    {
        return $this->verified_at;
    }
 
    public function setVerified_at($verified_at)
    {
        $this->verified_at = $verified_at;

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

    

    
}
