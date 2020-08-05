<?php 
// define('ROOTPATH', __DIR__);
// define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']);
// define('ROOTPATH', 'chainel with osticket/');
// echo ROOTPATH; 
// echo ('Profile');
ini_set('display_errors',0);
$_SERVER['REQUEST_URI']='';
session_start();
include 'common.php'; //for change language common file 
?>
<script> 
$(document).ready(function(){
	$(".login_form").hide();
    $("#flip_login").click(function(){
        $(".login_form").slideToggle("slow");
    });
    $("#cancel_login").click(function(){
        $(".login_form").slideUp("slow");
    });
});
</script>
<!-- script for custom search -->
<script>
  (function() {
    var cx = '014762488517831781583:qgmhfucpnsw';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<div class=" pull-right" id="languages">
	<!-- <select id="language" onchange="changeLang()">
	  <option value="">--Select--</option>
	  <option value="en">English</option>
	  <option value="ar">Arabic</option>
	</select> -->
	<script type="text/javascript">
		// function changeLang(){
		// 	var lang =$('#language').val();
		// 	var dataString = 'lang='+ lang;
		// 	$.ajax({
		// 		type:"POST",
		// 		url:"common.php",
		// 		data:dataString,
		// 		cache:true,
		// 		success:function(response){
		// 			window.location.reload(true);
		// 			$('#language').val(lang);
		// 		}
		// 	});
		// }
	</script>
	<a href="<?php echo $_SERVER['REQUEST_URI']; ?>?lang=en"><img src="images/en.png" /></a>
	<a href="<?php echo $_SERVER['REQUEST_URI']; ?>?lang=ar"><img src="images/ar.png" /></a>
</div>
<div class="row company_logo">
	<div class="col-xs-12 col-sm-12 col-md-8">
		<a class="navbar-brand " href="index"><img src="images/company_logo.png" /></a>
		<h3><?php echo $lang['heading']; ?></h3>
	</div>
	
	<div class="col-md-4 custom_search">
		<!-- <gcse:search></gcse:search> -->
	</div>
</div><!-- logo -->

<nav class="row navbar navbar-default" role="navigation">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav navbar-left">
		<li class="common"><a href="index"><?php echo $lang['MENU_HOME'] ?></a></li>
		<li class="dropdown" id="myDropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $lang['MENU_PRODUCTS'] ?> <b class="caret "></b></a>
		<ul class="dropdown-menu" >
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><?php echo $lang['SUB_MENU_PRODUCTS']; ?></a>
                <ul class="submenu1">
                  	<li><a href="General Ledger"><?php echo $lang['SUB_MENU_GL']; ?></a></li>
					<li><a href="inventory"><?php echo $lang['SUB_MENU_IM']; ?></a></li>
					<li><a href="sales"><?php echo $lang['SUB_MENU_SALES']; ?></a></li>
					<li><a href="purchase"><?php echo $lang['SUB_MENU_PURCHA']; ?></a></li>
					<li><a href="fixed-assets"><?php echo $lang['SUB_MENU_FA']; ?></a></li>
					<li><a href="Ready Mixtures Modules"><?php echo $lang['SUB_MENU_CRM']; ?></a></li>
					<li><a href="#"><?php echo $lang['SUB_MENU_MANUFAC']; ?></a></li>
					<li><a href="#"><?php echo $lang['SUB_MENU_RRE']; ?></a></li>
					<li><a href="patient-medical-records"><?php echo $lang['SUB_MENU_PMR']; ?></a></li>
					<li><a href="#"><?php echo $lang['SUB_MENU_POS']; ?></a></li>
					<li><a href="#"><?php echo $lang['SUB_MENU_BS']; ?></a></li>
					<li><a href="#"><?php echo $lang['SUB_MENU_CM']; ?></a></li>	
                </ul>
              </li>
               <!-- <li class="divider"></li> -->
			  <li><a href="#"><?php echo $lang['SUB_MENU_HRM']; ?></a></li>	
		</ul>
		</li>

		<li><a href="clients"><?php echo $lang['MENU_CLIENTS'] ?></a></li>
		<li><a href="contact-us"><?php echo $lang['MENU_CONTACT'] ?></a></li>
		<li id="flip_login"><a ><?php echo $lang['MENU_LOGIN'] ?></a></li>
		
		<br><br>
		<div class="col-md-4 col-md-offset-3 login_form">
			<form action="php/check_login.php" role="form" method="POST">
			  <div class="cancel_login"><span id="cancel_login" class="glyphicon glyphicon-remove pull-right"></span></div>
	          <div class="form-group">
	            <label for="userid-name">User Id</label>
	            <input type="text" name="luser" class="form-control custom_input" id="userid-name" placeholder="<?php echo $lang['user_id']; ?>" required>
	          </div>
	          <div class="form-group">
	            <label for="password-text">Password</label>
	            <input type="password" name="lpasswd" class="form-control custom_input" id="password-text" placeholder="<?php echo $lang['password']; ?>" required>
	          </div>
	          
		      <div class="col-md-12 modal-footer">
		      	<div class="row">
		      	<button type="submit" name="check_login" class="btn btn-success btn-lg  custom_btn pull-left"><span class="glyphicon glyphicon-user"></span> <?php echo $lang['login']; ?></button>
	     		</div>
	     		<div class="row"> 
	     			<p class="row col-md-12 pull-left"><a href="user_pwd_reset1.php"><?php echo $lang['forgot_password_reset']; ?></a></p>
	     			<!-- <p id="sign_new" class="row col-md-12 pull-left">Don't have an account? Sign-Up.</p> -->
	     			<p id="sign" class="row col-md-12 pull-left"><?php echo $lang['dont_have_an_account']; ?> <a href="signup"><?php echo $lang['signup']; ?></a>.</p>
	     		</div>
		      </div><!-- col-md-12 modal-footer -->
	        </form>
		</div><!-- login_form -->
		<!-- <li id="flip_signup"><a >Sign-up</a></li> -->
		
	  </ul>
	  <?php 
		// ini_set('display_errors',0);
		 // echo $_POST['luser'];
		 	// print_r($_SESSION['_auth']);
			$auth = $_SESSION['_auth'];
			// print_r($auth['user']);
			$id=$auth['user'];
			// echo $id['id'];

		if(isset($_SESSION['user_id']) OR isset($id['id'])){
			// echo $_SESSION['user_name'];
			if (isset($id['id'])) {
				require_once 'php/connect_pdo.php';
				$result=$db->prepare("SELECT * FROM ost_user WHERE id=:id");
				$result->bindParam(':id',$id['id']);
				$result->execute();
				foreach ($result->fetchAll() as $row) {
					$temp_email= $row['email'];
				}
				$result=$db->prepare("SELECT * FROM new_user WHERE user_email=:user_email");
				$result->bindParam(':user_email',$temp_email);
				$result->execute();
				foreach ($result->fetchAll() as $row) {
					$user_name= $row['user_name'];
				}
				echo "<ul class='nav navbar-nav navbar-right' id='logout'>";
				echo '<li class="user"><a href="edit_profile">Hi! '. $user_name.'</a></li>';
			}else{
				echo "<ul class='nav navbar-nav navbar-right' id='logout'>";
				echo '<li class="user"><a href="edit_profile">Hi! '. $_SESSION['user_name'].'</a></li>';
			}	echo '<li class="logout"><a href="php/logout.php">'. $lang['MENU_LOGOUT'] .'</a></li>';
				echo "</ul>";
				echo "<script> 
					$(document).ready(function(){
						$('#flip_login').hide();
					});
				</script>";
			}else{
				echo "<script> 
					$(document).ready(function(){
						$('.user').hide();
						$('.logout').hide();
					});
				</script>";
			}
		 ?>
	</div><!--/.nav-collapse -->

</nav> <!-- Fixed navbar end -->

<script type="text/javascript">
$(document).ready(function(){
	// $(".dropdown-toggle").css({"background-color": "#00796B", "height": "20px", "min-height": "40px"});
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");                
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");                
        });
    $(".dropdown-menu li a").hover(function(){
    	$(".dropdown-toggle ").css({"background-color": "#607d8b", "height": "10px", "min-height": "30px","color":"#000"});
		 }, function(){
    	$(".dropdown-toggle ").css({"background-color": "#cfd8dc", "height": "10px", "min-height": "30px"});
	});
	
});
</script>
