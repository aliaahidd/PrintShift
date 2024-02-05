<?php
    session_start();
    session_unset();
    session_destroy();
?>

<script>
    window.alert('You have been log out');
    location="login.php";
</script>