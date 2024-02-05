<?php
    require 'dbase.php';
    session_start();
    $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$admin_email)){
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=adminLogin.php" />
        <?php
    }
    $admin_password=(mysqli_real_escape_string($con,$_POST['admin_password']));
    if(strlen($admin_password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $admin_authentication_query="select admin_adminID,admin_email from admin where admin_email='$admin_email' and admin_password='$admin_password'";
    $admin_authentication_result=mysqli_query($con,$admin_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($admin_authentication_result);
    if($rows_fetched==0){
        //no admin
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=adminLogin.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($admin_authentication_result);
        $_SESSION['admin_email']=$admin_email;
        $_SESSION['admin_adminID']=$row['admin_adminID'];  //admin id

        //orders pending
        $queryOrderPend = "SELECT * FROM orders";  
        $resultOrderPend = mysqli_query($con, $queryOrderPend);
        $countOrderPend = mysqli_num_rows($resultOrderPend);

        $_SESSION['countPending'] = $countOrderPend;

        //history
        $queryHist = "SELECT * FROM history";  
        $resultHist = mysqli_query($con, $queryHist);
        $countHist = mysqli_num_rows($resultHist);

        $_SESSION['countHistory'] = $countHist;

        header('location: adminIndex.php');
    }
    
 ?>