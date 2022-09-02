 <?php

    use App\Database\Models\User;
    use App\Mails\Contract\Verification_Code;
    use App\Http\Requests\Validation;


    $title = 'register';
    include "layouts/header.php";
    include "layouts/navbar.php";
    include "layouts/breadcrump.php";

    $validation = new Validation;
    $user = new User;



    if ($_SERVER['REQUEST_METHOD'] == 'POST')
     {

        //validation 
        $validation->setInput('first_name')->setValue($_POST['first_name'])->require()->min(2)->max(32);
        $validation->setInput('last_name')->setValue($_POST['last_name'])->require()->min(2)->max(32);
        $validation->setInput('email')->setValue($_POST['email'])->require()->regex("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", 'invalid Email format')->unique('users', 'email');
        $validation->setInput('password')->setValue($_POST['password'])->require()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/', 'mini 8 chars max 32,password must contain at least one upper case letter , one lower case letter,one special charchter and must contain at least one number ')->confirmation($_POST['confirm_password']);
        $validation->setInput('confirm_password')->setValue($_POST['confirm_password'])->require();
        $validation->setInput('phone')->setValue($_POST['phone'])->require()->regex('/^01[0125][0-9]{8}$/', 'invalid phone number')->unique('users', 'phone');
        $validation->setInput('gender')->setValue($_POST['gender'])->in(['Male', 'Female']);

        // old values
        $first_name = $validation->getOld_values('first_name');
        $last_name = $validation->getOld_values('last_name');
        $email = $validation->getOld_values('email');
        $phone = $validation->getOld_values('phone');
        $gender = $validation->getOld_values('gender');



        //add user data after validation
        if (empty($validation->getErrors())) {
            // set user values to create user by function creat
            $mail_code = rand(10000, 99999);
            $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setEmail($_POST['email'])->setPhone($_POST['phone'])->setGender($_POST['gender'])->setVerification_code($mail_code)->setPassword($_POST['password']);

            if ($user->create());
             {

                //send mail
                $verification_mail = new Verification_Code;

                $subject = "verification code";
                $body = "<p>Hello {$_POST['first_name']}</p>
                <p>Your Verification Code: <b style='color:blue;'>{$mail_code}</b></p>
                <p>Thank You.</p>";

                if ($verification_mail->send($_POST['email'], $subject, $body))
                {
                    $_SESSION['email'] = $_POST['email'];
                    header('location: check_verification_code.php');
                    die;
                }
                 else {
                    $error = "<div class='alert alert-danger text-center'> Please Try Again Later </div>";
                }
            }

            if (!$user->create()) 
            {
                echo 'somthing went wrong try again';
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

                         <a data-toggle="tab" href="#lg2">
                             <h4> register </h4>
                         </a>
                     </div>
                     <div class="tab-content">
                         <div id="lg1" class="tab-pane active">
                             <div class="login-form-container">
                                 <div class="login-register-form">
                                 </div>
                             </div>
                         </div>
                         <div id="lg2" class="tab-pane active">
                             <div class="login-form-container">
                                 <div class="login-register-form">
                                     <form method="POST">
                                         <input type="text" name="first_name" placeholder="first name" <?php if (isset($first_name)) { ?> value="<?php echo $first_name;
                                                                                                                                            } ?>">
                                         <?php $validation->get_my_message($validation->get_my_error('first_name')); ?>

                                         <input type="text" name="last_name" placeholder="last name" <?php if (isset($last_name)) { ?> value="<?php echo $last_name;
                                                                                                                                        } ?>">
                                         <?php $validation->get_my_message($validation->get_my_error('last_name')); ?>

                                         <input type="email" name="email" placeholder="Email" <?php if (isset($email)) { ?> value=" <?php echo $email;
                                                                                                                                } ?>">
                                         <?php $validation->get_my_message($validation->get_my_error('email')); ?>

                                         <input type="password" name="password" placeholder="Password">
                                         <?php $validation->get_my_message($validation->get_my_error('password')); ?>

                                         <input type="password" name="confirm_password" placeholder="confirm Password">
                                         <?php $validation->get_my_message($validation->get_my_error('confirm_password')); ?>

                                         <input type="number" name="phone" placeholder="phone" <?php if (isset($phone)) { ?> value="<?php echo $phone;
                                                                                                                                } ?>">
                                         <?php $validation->get_my_message($validation->get_my_error('phone')); ?>

                                         <select name="gender" class="form-control my-3" id="">
                                             <option <?php if (isset($gender)) echo $gender == 'Male' ? 'selected' : '' ?> value="Male"> Male </option>
                                             <option <?php if (isset($gender)) echo $gender == 'Female' ? 'selected' : '' ?> value="Female">Female </option>
                                         </select>
                                         <?php $validation->get_my_message($validation->get_my_error('gender')); ?>

                                         <div class="button-box">
                                             <button type="submit"><span>Register</span></button>
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
    include "layouts/footer.php";
    include "layouts/scripts.php";
    ?>