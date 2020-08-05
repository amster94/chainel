<!DOCTYPE html>
<html>
<head>
    <title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
   <?php include 'res/header.html'; ?>
	<!-- // <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
</head> 
<?php
session_start();
// If login is not valid go to index page

if(isset($_SESSION['user_id'])){ 
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html");
exit();
}
?>

<body>
	<div class="container-fluid">

		<div class="row">
      <div  class="col-md-2 master_list">
        <?php include 'user_menu.html'; ?>
      </div><!-- col-md-2 master_list -->

      <div class="col-md-10 forms">
        <!-- <p id="txtHint"></p> -->
        <div class="edit_client_profile"><?php include 'edit_profile.php'; ?></div>
        <div class="user_password"><?php include 'change_pwd_form.php'; ?></div>

      </div> <!--  col-md-10 forms -->
    </div><!-- row -->
	</div><!-- container -->
</body>

<script>
// code for master list hide and show form
$(document).ready(function(){
	$(".user_password").hide();
 $("input[type=text],input[type=email],input[type=number], input[name=user_save], select, textarea").hide();

    $("#edit_client_profile").click(function(){
        $(".edit_client_profile").delay("400").fadeIn("3000");
        $(".user_password").delay("400").fadeOut("3000");
    
          
        });

    $("#user_password").click(function(){
        $(".user_password").delay("400").fadeIn("3000");
        $(".edit_client_profile").delay("400").fadeOut("3000");

    });

    
    
});
</script>
</html>