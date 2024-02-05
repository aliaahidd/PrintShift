<?php
    require 'dbase.php';
    session_start();
    $users_fullname= mysqli_real_escape_string($con,$_POST['users_fullname']);
    $users_email=mysqli_real_escape_string($con,$_POST['users_email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$users_email)){
        echo "Incorrect email. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $users_username=mysqli_real_escape_string($con, $_POST['users_username']);
    $users_password=(mysqli_real_escape_string($con,$_POST['users_password']));
    if(strlen($users_password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $users_phoneNo=$_POST['users_phoneNo'];
    $users_address=$_POST['users_address'];
    $users_city=mysqli_real_escape_string($con,$_POST['users_city']);
    $users_state=mysqli_real_escape_string($con,$_POST['users_state']);
    $users_postalCode=mysqli_real_escape_string($con,$_POST['users_postalCode']);
    $duplicate_user_query="select users_userID from users where users_email='$users_email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
        //duplicate registration
        //header('location: signup.php');
        ?>
        <script>
            window.alert("Email already exists in database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }else{
        $user_registration_query="insert into users(users_fullname,users_email,users_username,users_password,users_phoneNo,users_address,users_city,users_state, users_postalCode) values ('$users_fullname','$users_email','$users_username','$users_password','$users_phoneNo','$users_address','$users_city','$users_state','$users_postalCode')";
        //die($user_registration_query);
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        echo "User successfully registered";
        $_SESSION['users_email']=$users_email;
        //$_SESSION['users_userID']=$row['users_userID'];
        //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        //$_SESSION['users_userID']=mysqli_insert_id($con); 
        //header('location: products.php');  //for redirecting
        ?>
        <meta http-equiv="refresh" content="3;url=login.php" />
        <?php
    }
    
?>