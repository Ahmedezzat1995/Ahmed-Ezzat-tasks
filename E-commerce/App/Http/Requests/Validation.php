<?php

namespace App\Http\Requests;

use App\Database\Models\Contract\Model;

class Validation extends Model
{
   private string $input;
   private $value;
   private array $errors = [];
   private array $old_values = [];

   // rquire function to make user fill register form 
   public function require()
   {
      if (empty($this->value)) {
         $this->errors[$this->input][__FUNCTION__] = "{$this->input} is required";
      }
      return $this;
   }

   // max used to put max charachter to value
   public function max(int $max)
   {
      if (strlen($this->value) > $max) {
         $this->errors[$this->input][__FUNCTION__] = "{$this->input} must be less than $max";
      }
      return $this;
   }

   // min used to put min charachter to value
   public function min(int $min)
   {
      if (strlen($this->value) < $min) {
         $this->errors[$this->input][__FUNCTION__] = "{$this->input} must be greater than $min";
      }
      return $this;
   }

   //check shape of input
   public function regex(string $pattern, $message)
   {
      if (!preg_match($pattern, $this->value)) {
         $this->errors[$this->input][__FUNCTION__] = $message;
      }
      return $this;
   }

   //check confirmation 
   public function confirmation($confirmed)
   {
      if ($this->value != $confirmed) {
         $this->errors[$this->input][__FUNCTION__] = "{$this->input} and confirmed {$this->input} does'nt match ";
      }
      return $this;
   }

   // force user to input values from your array values only
   public function in(array $array)
   {
      $x=in_array($this->value, $array); 
      
      if ($x !=1)
      {
         $this->errors[$this->input][__FUNCTION__] = "{$this->input} must be " .implode(',', $array);
      }
      return $this;
   }




   //check unique input
   public function unique(string $table, $colum)
   {
      $query = "select * from {$table} where {$colum} = ? ";
      $model = new Model;
      $stmt = $model->conn->prepare($query);
      $stmt->bind_param('s', $this->value);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
         $this->errors[$this->input][__FUNCTION__] = "this {$this->input} is already exists";
      }
      return $this;
   }

   //check if value is exists
   public function exists(string $table, $colum)
   {
      $query = "select * from {$table} where {$colum} = ? ";
      $model = new Model;
      $stmt = $model->conn->prepare($query);
      $stmt->bind_param('s', $this->value);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows == 0) {
         $this->errors[$this->input][__FUNCTION__] = "this {$this->input} is dosen't exists";
      }
      return $this;
   }


//set size digits for input
public function set_size(int $digits)
{
    if(strlen($this->value) != $digits){
        $this->errors[$this->input][__FUNCTION__] = "{$this->input} Must be {$digits} digits";
    }
    return $this;
}


   //get my errors and return only first error
   public function get_my_error($key)

   {
      if (isset($this->errors[$key]))
         foreach ($this->errors[$key]  as $error) {
            return $error;
         }
      return null;
   }

   //take my first error from get_my_error_function
   public function get_my_message($message)
   {
      if ($message != null)
         echo "<p class='text-danger font-weight-bold'> " . ucwords(str_replace('_', ' ', $message)) . " </p>";
   }



   public function getInput()
   {
      return $this->input;
   }


   public function setInput($input)
   {
      $this->input = $input;
      return $this;

   }


   public function getValue()
   {
      return $this->value;
      
   }


   public function setValue($value)
   {
      $this->value = $value;
      $this->old_values[$this->input]=$value ;
      return $this;

   }


   public function getOld_values($key)
   {
      return $this->old_values[$key];
   }



   public function getErrors()
   {
      return $this->errors;
   }


   public function setErrors($error)
   {
      $this->errors = $error;

      return $this;
   }
}
