<?php
session_start();
include('dbase.php');
$historyID=$_GET['id']; 
$delete_query="DELETE from history where historyID = '$historyID'";
$delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
$_SESSION['countHistory'] = $_SESSION['countHistory']-1;
?>
    <script>
        window.alert('History has been deleted permanently');
        location="userHistory.php";
    </script>