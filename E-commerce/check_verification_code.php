<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Verify Your Account";
include "layouts/header.php";
include "layouts/navbar.php";
//include "App/Http/Middlewares/NotVerified.php";


$validation = new Validation;

if($_SERVER['REQUEST_METHOD'] == "POST")
{
   
    // make validation for user code
    $validation->setInput('verification_code')->setValue($_POST['verification_code'])->require()->set_size(5)->exists('users','verification_code');
  
 
   // if no errors after validiation
    if(empty($validation->getErrors()))
    {

        $user = new User;
        $result = $user->setEmail($_SESSION['email'])->setVerification_code($_POST['verification_code']) ->checkCode();
       
        //check verification code and email for user
        if($result->num_rows == 1)
        {
             $user->setVerified_at(date('Y-m-d H:i:s'));
        
       
             // check vailidation_at if updated or not    
            if   ( $user->makeUserVerified()) {
                  header('location:login.php')  ;
                 }
                
            else {
                    $error = "<div class='alert alert-danger text-center'> Something Went Wrong </div>";
                 }
            
    }
  
    else{
        $error = "<div class='alert alert-danger text-center'> Wrong Verification Code </div>";
    }
}
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?></h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <?=  $error ?? "" ?>
                                        
                                        <input type="number"  name="verification_code" placeholder="Verification Code">
                                        <?php  $validation->get_my_message($validation->get_my_error('verification_code')); ?>

                                        <div class="button-box">
                                        <button type="submit"><span>Verify</span></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include "layouts/scripts.php";
?>
