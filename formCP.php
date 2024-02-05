<?php
session_start();
    require 'dbase.php';

    $userID = $_GET['id'];
    extract($_POST);
    $oldPass=mysqli_real_escape_string($con, $_POST['oldPass']);
    $newPass=mysqli_real_escape_string($con, $_POST['newPass']);
    $confPass=mysqli_real_escape_string($con, $_POST['confPass']);

    $query = "SELECT * FROM users where users_userID = '".$_SESSION['users_userID']."'";  
                $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {
                         $password = $row['users_password'];
                         
    //correct old password
    if ($password == $oldPass){

        if(strlen($newPass)<6 || strlen($confPass)<6){
            echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
            ?>
            <meta http-equiv="refresh" content="2;url=changePassword.php" />
            <?php
        }
        else {
            if($newPass == $confPass){
                $update_query="UPDATE users SET users_password='$newPass' where users_userID='$userID'";
                $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
                echo "You have successfully change your password!";           
             ?> <meta http-equiv="refresh" content="2;url=profile.php" />
            <?php
            } else {
                ?>
                <script>
                window.alert("Your password do not match");</script>
                <meta http-equiv="refresh" content="2;url=changePassword.php" />
                <?php  
            }
        }  
    }
    //incorrect old password
    else if ($password != $oldPass) { 
        echo "Old password is incorrect"; ?>

        <meta http-equiv="refresh" content="2;url=changePassword.php" />

        
    
    <?php
    }
}}   
?>