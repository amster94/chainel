<?php 
// session_start();
// // $_SESSION['admin_user_id']=TRUE;
	
// 	session_unset();
// 	session_destroy();
// 	setcookie("user", null, time() - (86400 * 30), '/', '.login.php');
// 	header("location:index.php");
?>

<?php
session_start();
unset($_SESSION['admin_user_id']);
unset($_SESSION['password']);
unset($_SESSION['user_id']);
unset($_SESSION['user_password']);
session_destroy(); 

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../index");
?>
