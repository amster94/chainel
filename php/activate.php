<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.css" />
</head>
<body>
</body>
</html>
<?php 
$key= $_GET['key'];
$user_code= $_GET['email'];
$active="Activated";
// $msg='';
require_once ('connect_pdo.php');

$already_active = $db->prepare("SELECT * FROM new_user  WHERE link_id=:link_id AND user_code=:user_code");
$already_active->bindParam(':link_id', $active);
$already_active->bindParam(':user_code', $user_code);
$already_active->execute();

$result = $db->prepare("SELECT * FROM new_user  WHERE link_id=:link_id");
$result->bindParam(':link_id', $key);
$result->execute();


if ($result->rowCount()>0) {
	
	$activate=$db->prepare("UPDATE new_user SET link_id=:active WHERE link_id=:key AND user_code=:user_code");
	$activate->bindParam(':active',$active);
	$activate->bindParam(':key',$key);
	$activate->bindParam(':user_code',$user_code);
	$activate->execute();
	$msg ="Your Account has been activated, Contact admin for approval!";
}elseif($already_active->rowCount()>0){
	$msg ='You have already actived your account!';
}else{$msg='Something wrong please contact admin!';}
echo '<p class="alert alert-success col-md-8 col-md-offset-2 row">'.$msg.'</p>'
?>