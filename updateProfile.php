<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Update Profile</title>
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
        .btn-primary {
            background-color: #00A693;
            border-color: #00A693;
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
         <?php if ($row['profileImage'] != "") {?>
    <p><?php echo '<img style="width: 40px; height: 40px; border-radius: 50%;" src="data:image;base64,'.base64_encode( $row['profileImage'] ).'" id="profImg">'?> <?php echo $row['users_username']; ?></p>
    <?php } else { ?>
    <p><img src="profImage/anon.png" id="profimg" style="width: 40px; height: 40px; border-radius: 50%;"> <?php echo $row['users_username'];  ?></p></p>
    <?php } ?>
        
        <hr>
            <h6>My Account</h6>
        <hr>
            <p><a style="color: #00A693;" href = "profile.php" >Profile</a></p>
            <p><a href = "changePassword.php" >Change Password</a></p>
        <hr>
            <h6>Order</h6>
        <hr>
        <p><a href = "checkStatus.php" >Order Pending</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countOrder']; ?></span></p>
            <p><a href = "userHistory.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countComplete']; ?></span></p>
            <p><a href = "orderComplete.php" >Order History</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countHistory']; ?></span></p>
  </div>

  <div class="column middle" style="padding: 20px 0px 0px 100px;">
    <h2>Profile</h2>
    <h4>My Profile</h4><br>
        <form method="post" action="userupdate.php?id=<?php echo $row['users_userID']?>" >
            <table>
                <tr>
                    <td>Full Name:</td><td><input type="text" value="<?php echo $row["users_fullname"] ?>" name="usersFullname" class="form-control"></td>
                </tr>
                <tr>
                    <td>Email: </td><td><input type="text" value="<?php echo $row["users_email"] ?>" name="usersEmail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></td>
                </tr>
                <tr>
                    <td>Phone Number:</td><td><input type="text" value="<?php echo $row["users_phoneNo"] ?>" name="usersPhoneno" class="form-control"></p></td>
                </tr>
                <tr>
                    <td>Address: </td><td><input type="text" value="<?php echo $row["users_address"] ?>" name="usersAddress" class="form-control"></td>
                </tr>
                <tr>
                    <td>City:</td><td><input type="text" value="<?php echo $row["users_city"] ?>" name="usersCity" class="form-control"></td>
                </tr>
                <tr>
                    <td>Postal Code:</td><td><input type="text" value="<?php echo $row["users_postalCode"] ?>" name="usersPoscode" class="form-control"></td>
                </tr>
                <tr>
                    <td>State: </td><td><select id="state" name="usersState" class="form-control" value="<?php echo $row["users_state"] ?>" required>
                        <option value="<?php echo $row["users_state"] ?>"><?php echo $row["users_state"] ?></option>
                        <option value="Terengganu">Terengganu</option>
                        <option value="Perlis">Perlis</option>
                        <option value="Selangor">Selangor</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Johor">Johor</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="Perak">Perak</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                        <option value="Putrajaya">Putrajaya</option>
                    </select></td>
                </tr>
            </table>
            <input type="submit" value="Update" class="btn btn-primary" style="position: absolute; left: 600px">
        </form>
    <br>  
  </div>

  <div class="column side-right" style="padding: 100px 30px 50px 0px;">
    <!--<center><div id="canvas"><div id="output"></div>
                <div class="myTarget" ></div>
    </div></center>-->

    <?php if ($row['profileImage'] != "") {?>
    <center><?php echo '<img src="data:image;base64,'.base64_encode( $row['profileImage'] ).'" id="display" style="width: 300px; height: 300px; border-radius: 50%;"> '?></center>
   <?php } else { ?><center><img src="profImage/anon.png" id="profImg" style="width: 300px; height: 300px;"> </center>

   <?php } ?>
    

    <form method="post" action="profPic.php?id=<?php echo $_SESSION['users_userID']?>" enctype="multipart/form-data">  <?php }} ?>
        <center><div>
            <label for="bgImage"></label><br>
            <div class="upload-btn-wrapper">
                <button class="btnOnly">Upload a file</button>
                <input type="file" accept="image/*" onchange="readURL(this)" name="image" style="margin: auto; text-align:center;" style="width: 10px;" >
                     </div>
        </div></center> <br>
            
                <center><input type="submit" value="Save" name = "submit" class="btn btn-primary"></center>
                
            </form>
  </div>
  </div>
    </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>

<div class="footer">
    <?php include("footer.php"); ?>
</div>

</html>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#display')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script>
var loadFile = function(event) {
    document.getElementById("display").src = this.target.value;

  };
</script>
<style>
    .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btnOnly {
  border: 1px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 10px;
  border-radius: 8px;
  font-size: 16px;
}

.upload-btn-wrapper input[type=file] {
  font-size: 20px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>