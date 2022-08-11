<?php 
if($_POST)
{
    $math_dgree =$_POST['math'];
    $arabic_dgree=$_POST['arabic'];
    $englis_dgree=$_POST['english'];
    $biology_dgree=$_POST['biology'];
    $computer_dgree=$_POST['computer'];
   
    if($math_dgree==NULL || $arabic_dgree ==NULL || $englis_dgree ==NULL || $biology_dgree ==NULL || $computer_dgree==NULL )
    {
       $message='Please fill All degrees';
    }

       elseif($math_dgree>100 || $arabic_dgree >100 || $englis_dgree >100 || $biology_dgree >100 || $computer_dgree>100 )
       {
          $message='Not valid data (degree must be greater  than or equal (0) and less than or equal (100) ) ';
       }
       
       elseif($math_dgree<0 || $arabic_dgree <0 || $englis_dgree <0 || $biology_dgree <0 || $computer_dgree<0 )
       {
          $message=' Not valid data (degree must be greater  than or equal (0) and less than or equal (100) )';
       }
       else
         {
              $sum=$math_dgree+$arabic_dgree+$englis_dgree+$biology_dgree+$computer_dgree ;
              $final_dgree=($sum/500)*100 ;

              switch($final_dgree)
                 {
                 case $final_dgree>=90 :
                 $GPA='A';
                 $message="Precentge is {$final_dgree} %  and GPA is   ({$GPA})";
                 break ; 

                 case $final_dgree>=80 :
                 $GPA='B';
                 $message="Precentge is {$final_dgree} %  and GPA is   ({$GPA})";
                 break ;

                 case $final_dgree>=70 :
                 $GPA='C';
                 $message="Precentge is {$final_dgree} %  and GPA is   ({$GPA})";
                 break ;

                 case $final_dgree>=60 :
                 $GPA='D';
                 $message="Precentge is {$final_dgree} %  and GPA is   ({$GPA})";
                 break ;

                 case $final_dgree>=40 :
                 $GPA='E';
                 $message="Precentge is {$final_dgree} %  and GPA is   ({$GPA})";
                 break ;

                 default :
                 $GPA='F';
                 $message="Precentge is {$final_dgree} %  and GPA is   ({$GPA})";
                }
        }
      
}

?>


<html>
   <head>
      <meta charset="utf-8">
      <title>calcuate precentge</title>
      <link rel="stylesheet" href="style.css" >
   </head>

  <body>
       
         <form method='POST'>
            
                <label>Math degree </label>
                <input type='text' name='math' placeholder='Enter degree' >

                <label>Arabic degree </label>
                <input type='text' name='arabic' placeholder='Enter degree'>

                <label>English degree </label>
                <input type='text' name='english' placeholder='Enter degree'>

                <label>Biology degree </label>
                <input type='text' name='biology' placeholder='Enter degree'>

                <label>Computer degree </label>
                <input type='text' name='computer' placeholder='Enter degree'>

                <input type='submit' value='Calcuate' class='button'>

                <br>
                <br>
            <?php    if(isset($message))
               echo $message ; ?>
         </form>
       
       
    

  </body>  


</html>