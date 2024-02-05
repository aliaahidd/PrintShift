<?php
    // Include config file
    require_once "config.php";
    session_start();
    $counsellorName=mysqli_real_escape_string($link,$_POST['counsellorName']);
    $counsellorPassword=(mysqli_real_escape_string($link,$_POST['counsellorPassword']));
    if(strlen($counsellorPassword)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login2.php" />
        <?php
    }
    $user_authentication_query="select counsellorID,counsellorName from counsellor where counsellorName='$counsellorName' and counsellorPassword='$counsellorPassword'";
    $user_authentication_result=mysqli_query($link,$user_authentication_query) or die(mysqli_error($link));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login2.php" />
        <?php
        //header('location: login2');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['counsellorName']=$counsellorName;
        $_SESSION['counsellor_counsellorID']=$row['counsellor_counsellorID'];  //user id

        header('location: homecounsellor.php');
    }
    
 ?>
<!DOCTYPE html>
<html>
    <head>
    <link href="img/favicon.png" rel="shortcut icon"/>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css2/font-awesome.min.css"/>
	    <link rel="stylesheet" href="css2/flaticon.css"/>
	    <link rel="stylesheet" href="css2/slicknav.min.css"/>
	    <link rel="stylesheet" href="css2/jquery-ui.min.css"/>
	    <link rel="stylesheet" href="css2/owl.carousel.min.css"/>
	    <link rel="stylesheet" href="css2/animate.css"/>
        <link rel="stylesheet" href="css2/style.css"/>

    </head>
    
    <nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <center><a href="index.php" class="navbar-brand"><img src="image/logoPS.png" style="width: 150px; " alt=""></a></center>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">

                           
                       </ul>
                   </div>
               </div>
</nav>
<body>
        <br>
    <div class="containerr">  
    <div class="panel-body">
        
        <table>
            <form method="POST" action="config2.php">
            <center><table align="center" >
                <tr>
                    <td><h1 style="text-align: center; font-size:30px;"> LOGIN AN ACCOUNT </h1></td>
                    <td rowspan="21"><img src="img/ump-canseleri.png" style="padding-right: 10px;"></td>
                </tr>

                <tr>
                    <td><label for="fullname">Username: </label></td>
                </tr>
                <tr>
                    <td><input type="text" name="counsellorName" placeholder="counsellorName" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></td>
                </tr>


                <tr>
                    <td><label for="fullname">Password: </label></td>
                </tr>
                <tr>
                    <td><input type="password" name="counsellorPassword" placeholder="Password" class="form-control"  pattern=".{6,}"></td>
                </tr>

                <tr>
                    <td align="center"><input type="Submit" name="submit" value="Login" class="btn btn-primary" style="text-align: center;"></td>
                </tr>
                <tr>
                    <td><center><div class="panel-footer">Don't have an account? <a href="signup.php">Sign up</a></center></td>
                </tr>
         
            </table></center>
            </form>
        </table>
        </div>
    <a style="padding-right: 400px;" href="adminLogin.php">Admin Login</a></div>
    </div>
    </div>
    </div>
</body>