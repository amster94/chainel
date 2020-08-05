<!DOCTYPE html>
<html>
<head>
<title>Chainel Infosystem Pvt. Ltd.</title>
	<?php 
	include 'res/header.html';
	
	// session_start();
	 ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#loader_container').hide();
	});
</script>
<?php 
include 'res/header.html';
session_start();
ini_set('display_errors',0);
// If login is not valid go to index page
$auth = $_SESSION['_auth'];
// print_r($auth['user']);
$id=$auth['user'];
if(isset($_SESSION['user_id']) OR isset($id['id'])){
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>	
</head>
<body>
<div class="container main_containt">
<header><?php include 'header.php'; ?></header>
<div class="col-md-3 row">
<?php include 'user_menu.php'; ?>
</div><!-- col-md-3 -->
<div class="col-md-7">
	<!-- <h3 class="text_shadow pull-left">Change Password</h3> -->
		<div class="change_pwd_form ">
		<div id="loader_container"><p id="loader">Wait...</p></div>
			<form action="" method="POST" id="change_password_form">
			<!-- <div id="msg"></div> -->
				<div class="form-group">
					<label for="c_password"><?php echo $lang['current_password']; ?></label>
					<input type="password" class="form-control" name="current_password" id="c_password" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label for="n_password"><?php echo $lang['new_password']; ?></label>
					<input type="password" class="form-control" name="new_password" id="n_password" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label for="con_password"><?php echo $lang['confirm_password']; ?></label>
					<input type="password" class="form-control" name="confirm_password" id="con_password" autocomplete="off" required>
				</div>
				<div class="form-group">
					<input onclick="return saveFormData('#change_password_form')" type="submit" class="btn btn-success  btn-lg custom_btn" name="submit" value="<?php echo $lang['save']; ?>" >
					<input type="reset" class="btn btn-success  btn-lg custom_btn" name="p_clear" value="<?php echo $lang['clear']; ?>" >
				</div>
			</form>
		</div><!-- change_pwd_form -->
</div><!-- col-md-7 -->
		
</div><!-- container -->
<div class="container footer"></div>
</body>
</html>