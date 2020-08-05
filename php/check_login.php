<?php 
// collect data from login from
if (isset($_POST['check_login'])) {
	// $user_id = $_POST['user_id'];
	$user_id = $_POST['luser'];
	// $password = md5($_POST['password']);
	$pwd_for_ticket_lg=$_POST['lpasswd'];
	$password = md5($pwd_for_ticket_lg);
	// echo $user_id." ".$password;
}else{
	echo "Please fill User id and Password correctly...";
}

try {
  require_once ('connect_pdo.php');
  $flag='1';
  // $result= $db->prepare("SELECT * FROM new_user WHERE user_password=:password AND flag=:flag AND user_code=:user OR user_email=:user_email");
  $result= $db->prepare("SELECT * FROM new_user WHERE (user_code=:user OR user_email=:user_email OR user_contact=:user_contact) AND user_password=:password AND flag=:flag");
  $result->bindParam(':user',$user_id);
  $result->bindParam(':user_email',$user_id);
  $result->bindParam(':user_contact',$user_id);
  $result->bindParam(':password',$password);
  $result->bindParam(':flag',$flag);
  $result->execute();
 $rows=$result->rowCount(); 
  // $rows = $result->fetch(PDO::FETCH_NUM);//It also work same as above.
// echo $rows;
  foreach ($result->fetchAll() as $key ) {
  	$is_admins= $key['is_admin'];
  	$activated= $key['link_id'];
  	// $cookie_value=$key['user_code'];
	// $_SESSION['user_code']=$key['user_code'];
	$client_code_user= $key['client_code'];
	$user_name= $key['user_name'];
	$user_email= $key['user_email'];

  }
} catch (Exception $e) {
  $error=$e->getMessage();
}

if ($rows==1  AND $is_admins==1 ) {
	session_start();
	$_SESSION['admin_user_id']=$user_id;
	$_SESSION['password']=$password;
	$_SESSION['admin_name']=$user_name;

	// $_SESSION['SESSION'] = true; 
	
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../master");

}elseif($rows==1  AND $is_admins==0) {
	session_start();
	$_SESSION['user_id']=$user_id;
	$_SESSION['user_password']=$password;
	$_SESSION['client_code_user']=$client_code_user;
	$_SESSION['user_name']=$user_name;

	$_SESSION['u_password']=$pwd_for_ticket_lg;
	$_SESSION['user_email']=$user_email;
	
	// $_SESSION['SESSION'] = true; 
// setcookie("user_code", $cookie_value, time() + (86400 * 30), '/','change_pwd.php');
// setcookie("user_code", $user_id, time() + (86400 * 30));
// setcookie("password", $password, time() + (86400 * 30));

	// echo $_SESSION['user_id'];
	// echo $_SESSION['client_code_user'];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/../edit_profile");

}else{
	echo '<div class="row col-md-6 col-md-offset-3 alert alert-danger">'.'Wrong User id or Password OR Not Activated your acount!'.'</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.css" />
<style type="text/css">
	.alert-danger{
		margin-top:20px;
		color: red;
	}
</style>
</head>
<body>
<div class="col-md-6 col-md-offset-3 btn btn-lg"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Go back</a></div>
</body>
</html>