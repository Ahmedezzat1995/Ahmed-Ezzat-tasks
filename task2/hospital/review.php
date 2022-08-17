<?php 
session_start();
 
if($_SERVER['REQUEST_METHOD']=='POST')

{
 $_SESSION['phone_number']=$_POST['phone_number'];
   
  

  if($_SESSION['phone_number']==NULL )
  {
    
    header('location:login.php?message=1');
    
  }     
?>
<html>

<head>

  <meta charset="UTF-8">
  <title> login </title>


</head>



<body>

  <h1>your review</h1>


  <form method="POST" action='result.php'>

    <label>Are you satisfied with the cleanliness ?</label>
    <select name="cleanliness">
      <option value="bad">bad</option>
      <option value="good">good</option>
      <option value="very_good">very good</option>
      <option value="Excellent">Excellent</option>
    </select>
    <br>




    <label>Are you satisfied with the prices of the services ?</label>
    <select name="price_of_the_services">
      <option value="bad">bad</option>
      <option value="good">good</option>
      <option value="very_good">very good</option>
      <option value="Excellent">Excellent</option>
    </select>
    <br>

    <label>Are you satisfied with nursing service ?</label>
    <select name="nursing_service">
      <option value="bad">bad</option>
      <option value="good">good</option>
      <option value="very_good">very good</option>
      <option value="Excellent">Excellent</option>
    </select>
    <br>

    <label>Are you satisfied with the level of the doctor ?</label>
    <select name="level_of_the_doctor">
      <option value="bad">bad</option>
      <option value="good">good</option>
      <option value="very_good">very good</option>
      <option value="Excellent">Excellent</option>
    </select>
    <br>

    <label>Are you satisfied with the clamness in the hospital?</label>
    <select name="clamness_in_the_hospital">
      <option value="bad">bad</option>
      <option value="good">good</option>
      <option value="very_good">very good</option>
      <option value="Excellent">Excellent</option>
    </select>
    <br>


    <input type="submit" value="Submit">

  </form>

</body>


</html>
<?php }?>