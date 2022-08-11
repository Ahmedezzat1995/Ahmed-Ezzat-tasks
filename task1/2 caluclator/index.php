<?php
if($_POST)
{
 
      $first_number=$_POST['first'];
      $second_number=$_POST['second'];
      $operator=$_POST['operators'];
if($first_number!=NULL && $second_number!=NULL)
         {
          switch($operator)
           {
             case '+' :
             $message=$first_number+$second_number ;
             break ;
              
             case '-' :
             $message=$first_number-$second_number ;
             break ;

             case '*' :
             $message=$first_number*$second_number ;
             break ;

             case '/' :
             $message=$first_number/$second_number ;
             break ;

             case '%' :
             $message=$first_number%$second_number ;
             
            }
        }
        else $message='please Fill two numbers '; 
}

?>

<html>
   <head>
       
       <meta charset='utf-8'>
       <title>calcuator</title>
       <link rel='stylesheet' href='style.css' >   
   </head>


 
   <body>
        <form method='POST'>
             <label>First number</label>
             <input type='text' name='first' placeholder='Enter number'>

             <select name="operators">              
                <optgroup label="Operators">
                   <option>+</option>
                   <option>-</option>
                   <option>*</option>
                   <option>/</option>
                   <option>%</option>
                </optgroup>
             </select>

              <br>
              <br>
              
             <label>Second number</label>
             <input type='text' name='second' placeholder='Enter number'>


             <input type='submit' value='calculate'>
        </form>

        <?php if(isset($message))
        echo "Result = {$message}"; 
        ?>
   
    </body>


</html>