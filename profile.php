<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Profile</title>
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
            width: calc(50% - 3%);
            margin-right: 3%;
            background: white;
            padding: 20px;
        }

        .column.side-right {
            width: 35%;
            background: white;
            padding: 20px;
        }

        .main {
            max-width: 90%;
            margin: auto;
        }

        .footer {
            text-align: left;
            background: #ddd;
            margin-top: 20px;
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
            font-size: 16px;
        }

        #canvas {
            margin-top: 20px; 
            background-color:#fff;
            border:1px solid black;    
            height:200px;
            border-radius:50%;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            width:200px;
        }

        #profImg{
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  height: 300px;
}
.btn-primary {
  background-color: #00A693;
  border-color: #00A693;
}

</style>
    </head>
    <?php include("header.php"); ?>
    <body>
        <?php 
            $query = "SELECT * FROM users where users_userID = '".$_SESSION['users_userID']."'";  
            $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                while($row = mysqli_fetch_array($result))  
                {   
        ?>

    <div class="main">
    <div class="column side">
    <?php if ($row['profileImage'] != "") {?>
    <p><?php echo '<img style="width: 40px; height: 40px; border-radius: 50%;" src="data:image;base64,'.base64_encode( $row['profileImage'] ).'" id="profImg">'?> <?php echo $row['users_username']; ?></p>
    <?php } else { ?>
    <p><img src="profImage/anon.png" id="profimg" style="width: 40px; height: 40px; border-radius: 50%;"> <?php echo $row['users_username'];  ?></p></p>
    <?php } }}?>

    
        <hr>
            <h6>My Account</h6>
        <hr>
            <p><a style="color: #00A693;" href = "profile.php">Profile</a></p>
            <p><a href = "changePassword.php" >Change Password</a></p>
        <hr>
            <h6>Order</h6>
        <hr>
            <p><a href = "checkStatus.php" >Order Pending</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countOrder']; ?></span></p>
            <p><a href = "userHistory.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countComplete']; ?></span></p>
            <p><a href = "orderComplete.php" >Order History</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countHistory']; ?></span></p>
  </div>
  <?php 
            $query = "SELECT * FROM users where users_userID = '".$_SESSION['users_userID']."'";  
            $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                while($row = mysqli_fetch_array($result))  
                {   
        ?>
  <div class="column middle">
    <h2>Profile</h2>
    <h4>Profile Information</h4><br>
        <form method="post" action="updateProfile.php">
            <table>
                <tr>
                    <td><p><i class="glyphicon glyphicon-user"></i></td><td style="font-size: 20px;"><?php echo $row["users_fullname"] ?></p></td>
                </tr>
                <tr>
                    <td><p><i class="glyphicon glyphicon-envelope"></i></td><td style="font-size: 20px;"><?php echo $row["users_email"] ?></p></td>
                </tr>
                <tr>
                    <td><p><i class="glyphicon glyphicon-earphone"></i></td><td style="font-size: 20px;"><?php echo $row["users_phoneNo"] ?></p></td>
                </tr>
                <tr>
                    <td><p><i class="glyphicon glyphicon-map-marker"></i></td><td style="font-size: 20px;"><?php echo $row["users_address"] ?>, <?php echo $row["users_city"] ?>, <?php echo $row["users_postalCode"] ?>, <?php echo $row["users_state"] ?></p></td>
                </tr>
            </table>
            <input type="submit" value="Edit" class="btn btn-primary">
        </form>
    <br>
    
  </div>
  
  <div class="column side-right">
  <h2 style="visibility:hidden;">..</h2>
    <h4>Profile Picture</h4><br>
    <!--<center><div id="canvas"><div id="output"></div>
                <div class="myTarget" ></div>
    </div></center>-->

    <!--<center><img src="<?php if($row['profileImage']!= ""){echo $row['profileImage']; } else{?> profImage/anon.png <?php } ?>" id="profImg"></center>-->
   
   <?php if ($row['profileImage'] != "") {?>
    <center><?php echo '<img src="data:image;base64,'.base64_encode( $row['profileImage'] ).'" id="profImg">'?></center>
   <?php } else { ?><center><img src="profImage/anon.png" id="profImg" style="width: 200px; height: 200px;"></center> 

   <?php } ?>
    

    <form method="post" action="updateProfile.php?id=<?php echo $_SESSION['users_userID']?>" enctype="multipart/form-data">  <?php }} ?> <br>
            
                <center><input type="submit" value="Edit" name = "submit" class="btn btn-primary"></center>
                
            </form>
  </div>

  </div>
    </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="footer">
    <?php include("footer.php"); ?>
</div>

</html>