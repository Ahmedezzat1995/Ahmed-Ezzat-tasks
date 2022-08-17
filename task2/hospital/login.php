<?php 
session_start();

if ( isset($_GET['message']) && $_GET['message']==1 )
{
    $error = 'please enter phone number ';
}

?>

<html>
    <head>
  <meta charset="UTF-8">
  
  <title> login </title>

    </head>
    

    <body>

        <form method="POST" action='review.php'>
        
            <label> Phone number</label>
            <input type='number' name='phone_number'>

             <input type='submit' value='login'>

        </form>
        <?php
        
     if (isset($error))
     echo $error;
  
  ?>  
  </body>
</html>