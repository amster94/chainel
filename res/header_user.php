

<script>
  (function() {
    var cx = '001131721948357959359:h5l8shauwmi';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>

<div class="row company_logo">
	<div class="col-md-8">
		<a class="navbar-brand" href="index"><img src="images/company_logo.png" /></a>
		<h3>CHAINEL INFOSYSTEM PVT. LTD.</h3>
	</div>
	
	<div class="col-md-4 custom_search">
		<gcse:search></gcse:search>
	</div>
</div><!-- logo -->
<?php 
// define('ROOTPATH', __DIR__);
// define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']);
// define('ROOTPATH', 'chainel with osticket/');
  // echo ROOTPATH; 
  // echo ('Profile');
ini_set('display_errors',0);
session_start();

?>

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
		<li><a href="index">Home</a></li>
		
		<li class="dropdown" id="myDropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret "></b></a>
		<ul class="dropdown-menu" >
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Chainel V5.0</a>
                <ul class="submenu1">
                  	<li><a href="General Ledger">General Ledger</a></li>
					<li><a href="inventory">Inventory Management</a></li>
					<li><a href="sales">Sales</a></li>
					<li><a href="#">Purchase</a></li>
					<li><a href="#">Fixed Assets</a></li>
					<li><a href="Ready Mixtures Modules">Concrete Ready Mixtures</a></li>
					<li><a href="#">Manufacturing</a></li>
					<li><a href="#">Rental Real estate</a></li>
					<li><a href="#">Patients Medical records</a></li>
					<li><a href="#">POS</a></li>
					<li><a href="#">BI Suites</a></li>
					<li><a href="#">Catering Management</a></li>	
                </ul>
              </li>
               <!-- <li class="divider"></li> -->
			  <li><a href="#">HRM</a></li>	
		</ul>
		</li>

		<li><a href="clients">Clients</a></li>
		<li><a href="contact-us">Contact Us</a></li>
		<!-- <li id="flip_login"><a >Login</a></li> -->
		<li class="user"><a href="#">Hi! <?php echo $_SESSION['user_name']; ?></a></li>
		<li class=""><a  href="php/logout.php" >Logout</a></li>
		
		<div class="col-md-4 col-md-offset-3 login_form">
			<form action="php/check_login.php" role="form" method="POST">
				<div class="cancel_login"><span id="cancel_login" class="glyphicon glyphicon-remove pull-right"></span></div>
	          <div class="form-group">
	            <label for="userid-name" class="control-label">User Id</label>
	            <input type="text" name="user_id" class="form-control custom_input" id="userid-name" placeholder="User Id" required>
	          </div>
	          <div class="form-group">
	            <label for="password-text" class="control-label">Password</label>
	            <input type="password" name="password" class="form-control custom_input" id="password-text" placeholder="Password" required>
	          </div>
	          
		      <div class="col-md-12 modal-footer">
		      	<div class="row">
		      	<button type="submit" name="check_login" class="btn btn-success btn-lg  custom_btn pull-left"><span class="glyphicon glyphicon-user"></span> Login</button>
	     		</div>
	     		<div class="row"> 
	     			<p class="row col-md-12 pull-left"><a href="user_pwd_reset1.php">Forgot Password Reset</a></p>
	     			<!-- <p id="sign_new" class="row col-md-12 pull-left">Don't have an account? Sign-Up.</p> -->
	     			<p id="sign" class="row col-md-12 pull-left">Don't have an account? <a href="signup">Sign-Up</a>.</p>
	     		</div>
		      </div><!-- col-md-12 modal-footer -->
	        </form>
		</div><!-- login_form -->
		<!-- <li id="flip_signup"><a >Sign-up</a></li> -->
		
		
	  </ul>
	</div><!--/.nav-collapse -->

</nav> <!-- Fixed navbar end -->

<script type="text/javascript">
$(document).ready(function(){
// $(".dropdown-toggle").css("background-color","#00796B");
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
		$(".dropdown-toggle").css({"background-color": "#009688", "height": "20px", "min-height": "40px"});
	});
});
</script>
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
<style type="text/css">
	.user{
		margin-left: 350px;
	}
</style>