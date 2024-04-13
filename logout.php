<?php 

session_start();

session_unset();

header("Location: login_and_register_view.php");
exit();

?>

