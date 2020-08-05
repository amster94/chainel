<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.</title>
	<?php 
	include 'res/header.html'; 
	include 'common.php'; 
	?>
<?php 
ini_set('display_errors',0);
$msg='';
$user_email = $_GET['email'];
$password = md5($_POST['password']);
$confirm_password = md5($_POST['confirm_password']);
require_once ('php/connect_pdo.php');
if ($password!='' AND $confirm_password!='') {
	if ($password==$confirm_password) {
		$result=$db->prepare("UPDATE new_user SET user_password=:user_password WHERE user_email=:user_email");
		$result->bindParam(':user_password',$password);
		$result->bindParam(':user_email',$user_email);
		$result->execute();
		if ($result->rowCount()>0) {
			// change pwd for osticket 
			$select = $db->prepare("SELECT * FROM ost_user_email WHERE address='$user_email'");
                $select->execute();
                foreach ($select->fetchAll() as $row) {
                  $temp_uid=$row['user_id'];
                }
                // $new_pwd=$_POST['new_password'];
                $update_pwd= $db->prepare("UPDATE ost_user_account set passwd='$password' WHERE user_id='$temp_uid'");
                $update_pwd->execute();
            // change pwd for osticket  

			 $msg= "Password reset successfully.";
			echo '<script type="text/javascript">alert("' . $msg . '")</script>';
		}else{ 
			$msg= "You can change your Password here!"; 
			echo '<script type="text/javascript">alert("' . $msg . '")</script>';
		}

	}else{ $msg= "Password Missmatch!"; echo '<script type="text/javascript">alert("' . $msg . '")</script>';}

}else{$msg="Fields are required!"; echo '<script type="text/javascript">alert("' . $msg . '")</script>';}
// echo $msg;
// echo '<script type="text/javascript">alert("' . $msg . '")</script>';
?>	
</head>

<body>
	<div class="container">
		<center><h3 class="text_shadow"><?php echo $lang['password_recovery']; ?></h3></center>
		<div class="col-md-6 col-md-offset-3 chang_pwd2">
		<!-- <p></p> -->
			<form action="" id="resetPwd2" role="form" method="POST">
				<div class="form-group">
					<label for="password" class="control-label"><?php echo $lang['enter_password']; ?>:</label>
					<input type="password" name="password" class="form-control custom_input" id="password" placeholder="" required>
				</div>

				<div class="form-group">
					<label for="confirm_password" class="control-label"><?php echo $lang['confirm_password']; ?>:</label>
					<input type="password" name="confirm_password" class="form-control custom_input" id="confirm_password" placeholder="" required>
				</div>

				<div class="row">
					<div class="col-md-6 modal-footer">
					<button type="submit" name="reset_pwd" class="btn btn-success btn-lg pull-left custom_btn"><?php echo $lang['reset']; ?></button>
					<!-- <button onclick="return resetPwd2('#resetPwd2')"  name="reset_pwd" class="btn btn-success btn-lg pull-left custom_btn">Reset</button> -->
					</div>	
				</div>
				
	        </form>
		</div><!-- chang_pwd2 -->
	</div><!-- container -->

<script type="text/javascript">
	function resetPwd2(form_id){
		var form_id=form_id;
		var user_email = <?php echo $_GET['email']; ?>
		var dataString = $(form_id).serialize()+'&form_id='+form_id +'&user_email='+user_email;
		console.log(dataString);
		
		$.ajax({
			type:"POST",
			url:"php/save.php",
			data:dataString,
			cache:true,
			success:function(html) {
			// $( "*" ).prop("readOnly", false);
			// $("input[type=text],input[type=email],input[type=number],input[type=password],input[type=radio],select, textarea").val("");
				alert(html);
				// $('#msg').html(html);	
			}
		});
		return false;
}

</script>

</body>

</html>
