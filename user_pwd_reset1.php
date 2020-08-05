<!DOCTYPE html>
<html>
<head>
<?php 
include 'res/header.html'; 
include 'common.php'; 
?>
</head>

<body>
	<div class="container">
		<center><h3 class="text_shadow"><?php echo $lang['password_recovery']; ?></h3></center>
		<div class="col-md-6 col-md-offset-3 chang_pwd1">
		<!-- <p></p> -->
			<form action="" id="resetPwd1" role="form" method="POST">
				<div class="form-group">
					<label for="user_email" class="control-label"><?php echo $lang['enter_your_email']; ?>:</label>
					<!-- <i class="fa fa-user fa-lg"></i> -->
					<input type="email" name="user_email" class="form-control custom_input" id="user_email" placeholder="" required>
				</div>
				
				<div class="row">
					<div class="col-md-6 modal-footer">
					<button onclick="return resetPwd1('#resetPwd1')" name="send_mail" class="btn btn-success btn-lg pull-left custom_btn"><?php echo $lang['send']; ?></button>
					</div>
				</div>
				
	        </form>
		</div><!-- chang_pwd1 -->
	</div><!-- container -->


<script type="text/javascript">
	function resetPwd1(form_id){
		var form_id=form_id;
		var dataString = $(form_id).serialize()+'&form_id='+form_id;
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