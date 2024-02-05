<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="index.php" class="navbar-brand"><img src="image/logoPS.png" style="width: 150px; " alt=""></a>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">

                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['users_userID'])){
                            require 'dbase.php';
                            $query = "SELECT * FROM users where users_userID = '".$_SESSION['users_userID']."'";  
                            $result = mysqli_query($con, $query);  
                                if(mysqli_num_rows($result) > 0)  
                                {  
                                while($row = mysqli_fetch_array($result))  
                                {   
                           ?>
                           <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Hi, <?php echo $row['users_username'];?></a></li>
                           <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"><span class="badge"><?php echo $_SESSION['count']; ?></span></span> Cart</a></li>
                           <li><a href="logout.php" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }} } else{
                            ?>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                           <?php
                           }
                           ?>
                   </div>
               </div>
</nav>
<style>
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 2px 5px;
    font-size: 12px;
    font-weight: 600;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #00A693;
    border-radius: 10px;
}
</style>
<script>
$(function(){
    $('a#logout').click(function(){
        if(confirm('Are you sure to logout')) {
            return true;
        }

        return false;
    });
});
</script>