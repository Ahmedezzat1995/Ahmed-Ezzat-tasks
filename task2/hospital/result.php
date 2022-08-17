<?php

session_start();

if ($_POST) {
  $_SESSION['review'] = [];
  $_SESSION['review'][0] = $_POST['cleanliness'];
  $_SESSION['review'][1] = $_POST['price_of_the_services'];
  $_SESSION['review'][2] = $_POST['nursing_service'];
  $_SESSION['review'][3] = $_POST['level_of_the_doctor'];
  $_SESSION['review'][4] = $_POST['clamness_in_the_hospital'];

  $_SESSION['result'] = [];


  foreach ($_SESSION['review'] as $review) {
    if ($review == 'bad')
      $_SESSION['result'][] = 0;

    elseif ($review == 'good')
      $_SESSION['result'][] = 3;

    elseif ($review == 'very_good')
      $_SESSION['result'][] = 5;

    elseif ($review == 'Excellent')
      $_SESSION['result'][] = 10;
  }


  $_SESSION['sum'] = array_sum($_SESSION['result']);


?>

<html>

     <head>
         <meta charset="UTF-8">
         <title> Result </title>
     <head>

     <body>
        <table width='40%' border="1" >
      
      <?php
      $qustions=['Are you satisfied with the cleanliness ?','Are you satisfied with the prices of the services ?',
      'Are you satisfied with nursing service ?','Are you satisfied with the level of the doctor ?','Are you satisfied with the clamness in the hospital?'];
      $selected_reviews_degree=$_SESSION['result'];
      $final_selected_review=[];
      foreach($selected_reviews_degree as $key => $new_result)
      {
        if($new_result==0)
        {$final_selected_review[]='bad';}

       elseif($new_result==3)
        {$final_selected_review[]='good';}
        
        elseif($new_result==5)
        {$final_selected_review[]='very good';}

        elseif($new_result==10)
        {$final_selected_review[]='Excellent';}
      }
      
  
      ?>
          <tr>
              <th>Qustions</th>
               <th>Result</th>
           </tr>
           <?php
           $counter=0;
               foreach($qustions as $qustion)
               {
                echo "<tr>";
                echo "<td> {$qustion} </td>";
                if ($counter<sizeof($final_selected_review))
                {
                    echo "<td> $final_selected_review[$counter]</td>";

                    $counter++ ;
                }
                echo "<tr>";
              
               }
        
            ?>   

     </table>

   
     <?php 
     $phone_number=$_SESSION['phone_number'];
     if ($_SESSION['sum']<25)
     {
        echo "finel review = bad";
        echo"<br>";
        echo " we will call you later on this phone :{ $phone_number}";
     }
     else 
     {  
        echo "finel review = good";
        echo"<br>";
        echo "Thanks .";
    };
     ?>

     </body>

</html>

<?php } ?>