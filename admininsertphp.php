<?php 
include('dbase.php');
extract($_POST);

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$insert_query= "INSERT INTO readymade(readymadeClass, readymadeType, readymadeName, readymadeDesc, readymadeImage) values ('$category','$readymadeType','$readymadeName','$readymadeDesc','$image')";
$insert_result=mysqli_query($con,$insert_query) or die(mysqli_error($con));

?>
<script>
    window.alert("Design has been added in the database");
</script>
<meta http-equiv="refresh" content="1;url=admininsertdesign.php">