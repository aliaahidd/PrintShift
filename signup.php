<!DOCTYPE html>
<html>
    <head>
    <link href="img/favicon.png" rel="shortcut icon"/>
        <title>Confirm Details</title>
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
            <form method="POST" action="user_registration_script.php">
            <center><table align="center" >
                <tr>
                <td rowspan="21"><img src="image/signup.png" style="padding-right: 10px;"></td>
                    <td cellpadding="10px;"><h1 style="text-align: center; font-size:30px;"> CREATE AN ACCOUNT </h1></td>
                </tr>
                <tr class="form-group">
                    <td><label for="fullname">Fullname: </label></td>
                </tr>
                <tr class="form-group">
                    <td><input type="text" name="users_fullname" placeholder="Fullname" class="form-control" required></td>
                </tr>

                <tr>
                    <td><label for="fullname">Email: </label></td>
                </tr>
                <tr>
                    <td><input type="email" name="users_email" placeholder="Email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></td>
                </tr>

                <tr>
                    <td><label for="fullname">Username: </label></td>
                </tr>
                <tr>
                    <td><input type="text" name="users_username" placeholder="Username" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="fullname">Password: </label></td>
                </tr>
                <tr>
                    <td><input type="password" name="users_password" placeholder="Password" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="fullname">Phone Number: </label></td>
                </tr>
                <tr>
                    <td><input type="text" name="users_phoneNo" placeholder="Phone Number" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="fullname">Address: </label></td>
                </tr>
                <tr>
                    <td><input type="text" name="users_address" placeholder="Address" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="fullname">City: </label></td>
                </tr>
                <tr>
                    <td><input type="text" name="users_city" placeholder="City" class="form-control" required></td>
                </tr>

                <tr>
                    <td><label for="fullname">State: </label></td>
                </tr>
                <tr>
                    <td><select id="state" name="users_state" class="form-control" required>
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

                <tr>
                    <td><label for="fullname">Postal Code: </label></td>
                </tr>
                <tr>
                    <td><input type="text" name="users_postalCode" placeholder="Postal Code" class="form-control"></td>
                </tr>
                <tr>
                    <td align="center"><input type="Submit" name="submit" value="Sign up" class="btn btn-primary" style="text-align: center;"></td>
                </tr>
                <tr>
                    <td><center><div class="panel-footer">Already have an account? <a href="login.php">Login</a></center></td>
                </tr>
         
            </table></center>
            </form>
        </table>
    </div>
    </div>
</body>
    <style>
        body{
            background-color: lightseagreen;	
        }
        .containerr{
            background: whitesmoke;
            width: 800px;
            padding: 10px;
            margin: auto;
            margin-bottom: 100px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .form-control{
            width: 400px;
        }

        select {
            display: block;
            width: 100%;
            height: calc(2.25rem + 20px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 2px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        select:focus {
            display: block;
            width: 100%;
            height: calc(2.25rem + 20px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 2px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        } 

        .navbar-inverse{
            background-color:#192D41;
            border-color: #192D41
        }

        .navbar-brand{
            padding: 0px 0px;
        }

        .column {
            float: left;
            padding: 10px;
        }

        .navbar {
            border-radius: 0px;
        }
        table{
            background-color: whitesmoke;
            padding: 50px;
            border-radius: 10px;
        }

        th,td{
            padding: 5px;
        }

        .panel-body{
            padding: 10px;
        }

    </style>
</html>