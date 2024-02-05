<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Change Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
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
        
        <style>
        .navbar-inverse{
            background-color:#192D41;
            border-color: #192D41
        }

        .navbar-brand{
            padding: 0px 0px;
        }
        
        .navbar {
            border-radius: 0px;
        }

        .column {
            float: left;
            padding: 10px;
        }

        /* Left and right column */
        .column.side {
            width: 15%;
        }
        .column.middle {
            width: 50%;
        }

        .column.side-right {
            width: 35%
        }

        .main {
            max-width: 90%;
            margin: auto;
        }

        .footer {
            text-align: center;
            background: #ddd;
            margin-top: 20px;
        }
        #profImg{
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        body{
            height: 1000px;
        }
        table, th, td{
            padding: 10px;
        }

        input[type=text]{
            width: 300px;
            padding: 5px;
        }

    </style>
    </head>
    <?php include("header.php"); ?>
    <?php
    include("dbase.php");  
                $query = "SELECT * FROM users where users_userID = '".$_SESSION['users_userID']."'";  
                $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {     
    ?>
    <body>
    <div class="main">
    <div class="column side">
        <p><?php echo '<img style="width: 40px; height: 40px; border-radius: 50%;" src="data:image;base64,'.base64_encode( $row['profileImage'] ).'" id="profImg">'?>
    <?php echo $row['users_username']; ?></p>
        
        <hr>
            <h6>My Account</h6>
        <hr>
            <p><a href = "profile.php" >Profile</a></p>
            <p><a style="color: #00A693;" href = "changePassword.php" >Change Password</a></p>
        <hr>
            <h6>Order</h6>
        <hr>
        <p><a href = "checkStatus.php" >Order Pending</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countOrder']; ?></span></p>
            <p><a href = "userHistory.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countComplete']; ?></span></p>
            <p><a href = "orderComplete.php" >Order History</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countHistory']; ?></span></p>
  </div>

  <div class="column middle" style="padding: 20px 0px 0px 100px;">
    <h2>Profile</h2>
    <h4>Change Password</h4><br>

    <table>
        <form method="post" action="formCP.php?id=<?php echo $row['users_userID']; ?>" >
    <tr>
        <td>Old Password: </td><td><input type="password" name="oldPass" class="form-control" required></td><br>
    </tr>
    <tr>
        <td>New Password: </td><td><input type="password" name="newPass" class="form-control" required></td><br>
    </tr>
    <tr>
        <td>Confirm Password: </td><td><input type="password" name="confPass" class="form-control" required></td>
    </tr>
    <tr>
        <tr>
            <td></td>
        </tr>
        <center><td colspan="2"><input type="submit" value="Save" class="btn btn-primary" style="background-color: #00A693;"></td></center>
    </tr>
        </form>
    </table>

    <?php }} ?>
  </div>

  <div class="column side-right" style="padding: 100px 30px 50px 0px;">


  </div>
  </div>
    </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>

<div class="footer">
    <?php include("footer.php"); ?>
</div>

</html>

