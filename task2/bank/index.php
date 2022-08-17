<?php 
if($_POST)
{  
    $user_name=$_POST['user_name'];
    $loan_amount=$_POST['loan_amount'];
    $loan_years=$_POST['loan_years'];
    $errors=[];   
    
    if($user_name!=NULL && $loan_amount!=NULL &&$loan_years!=NULL) 
    {
          
             if ($loan_years>0)
            
             {
                if($loan_years<=3)
                {
                $interst=($loan_years*.10)* $loan_amount ;
                }
                else
                {
                    $interst=($loan_years*.15)* $loan_amount ;

                }
                $loan_after_rate=$loan_amount+$interst ;
                $monthly=$loan_after_rate/($loan_years*12);           
            }
           
            else 
            {
                $errors[]='loan years must grater than zero';
            }
        
    }


    if($user_name==Null)
    { 
        $errors[]= 'please enter username';
    }

    if($loan_amount==Null)
    { 
        $errors[]= 'please enter loan amount';
    }
    
    if($loan_years==Null)
    { 
        $errors[]= 'please enter loan years';
    }
}




?>

<html>
     <head>
   <meta  charset='UTf_8' >
   <link rel="stylesheet" href="bank.css" >
   
   <title>Bank</title>
    </head>

    <body>
        <form method='POST'>
   
             <label>Username</label>
             <input type='text' name='user_name'>
             
             <br>
             
             <label>loan amount</label>
             <input type='number' name='loan_amount'>
            
             <br>
             
              <label>loan years </label>
              <input type='number' name='loan_years' >
              
              <br>
             
              <input type='submit' value='submit' >

             <br>
             <br>
    
        <form>
          <?php
if($_POST)
{
if(!empty($errors))
     {
        foreach($errors as $error)
        {
            echo($error);
            echo " ,  ";
        }
     }

       
       elseif(isset($user_name))
          {  echo "User Name :    {$user_name}";
          echo'<br>';
         } 
        
         if (isset($interst))
        echo "Interset:   {$interst}";

        echo'<br>';

        if (isset($loan_after_rate))
        echo "Loan After Rate     :{$loan_after_rate}";

        echo'<br>';

        if (isset($monthly))
        echo " Monthly :      {$monthly}";
      
        
}
 
        ?>
    </body>

</html>