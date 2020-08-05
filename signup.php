<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
	<?php include 'res/header.html'; ?>
</head>
<style type="text/css">
	.main_containt{min-height: 800px;}

</style>
<body>

	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		<div id="loader_container"><p id="loader">Wait...</p></div>
		<!-- containt goes here -->
		<div class="col-md-8 col-md-offset-2 outer_sign">
		<!-- <div class=""> -->
		<div class="signup_header"><center><h3><?php echo $lang['new_user_signup']; ?></h3></center></div>
			<form id="signup" class=" signup" action="" method="POST" name="signup_form" ng-app="validationApp" ng-controller="mainController" ng-submit="submitForm()" novalidate>
		<!-- <legend>CLIENT FORM</legend> -->
		<div class="col-md-6 note">
			<p><span><b><?php echo $lang['note']; ?>:</b></span> <?php echo $lang['required_fields_must_entered']; ?> <span class="red_star">*</span>.</p>
		</div>
		<div class="form-group row">
			
			<label for="location" class="col-md-2"><?php echo $lang['location']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-4 pull-right">
				<select class="form-control" name="location" id="location" required>
					<option value="Not Selected">--<?php echo $lang['select_location']; ?>--</option>
				</select>
			</div>
		</div><!-- form-group -->

		<div class="form-group row" >
			<label for="user_code" class="col-md-2"><?php echo $lang['user_id']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-4" ng-class="{ 'has-error' : signup_form.user_code.$invalid && !signup_form.user_code.$pristine }">
				<p ng-show="signup_form.user_code.$error.minlength" class="help-block">Client code is too short.</p>
				<input type="text" id="user_code" class="form-control" name="user_code"  ng-model="user.cl_code" ng-minlength="8"  autocomplete="off"  placeholder="User Id" required>
			</div>	
				<!-- <p ng-show="signup_form.user_code.$error.maxlength" class="help-block">Client code is too long.</p> -->
			
			<label for="user_name" class="col-md-2"><?php echo $lang['name']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-4" ng-class="{ 'has-error' : signup_form.user_name.$invalid && !signup_form.user_name.$pristine}">
				<p ng-show="signup_form.user_name.$error.minlength" class="help-block">User name should be min 5 char</p>
				<input  type="text" class="form-control" name="user_name" id="user_name" ng-model="user.user_name" ng-minlength="5" autocomplete="off" placeholder="Name" required>
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="user_password" class="col-md-2"><?php echo $lang['password']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-4" ng-class="{ 'has-error' : signup_form.user_password.$invalid && !signup_form.user_password.$pristine}">
				<p ng-show="signup_form.user_password.$error.minlength" class="help-block">Password should be min 5 char</p>
				<input  type="password" class="form-control" name="user_password" id="user_password" ng-model="user.user_password" ng-minlength="5" autocomplete="off" placeholder="Password" required>
			</div>	
			<label for="confirm_user_password" class="col-md-2"><?php echo $lang['confirm']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-4" ng-class="{ 'has-error' : signup_form.confirm_user_password.$invalid && !signup_form.confirm_user_password.$pristine}">
				<p ng-show="signup_form.confirm_user_password.$error.minlength" class="help-block">Password should be min 5 char</p>
				<input  type="password" class="form-control" name="confirm_user_password" id="confirm_user_password" ng-model="user.confirm_user_password" ng-minlength="5" autocomplete="off" placeholder="Confirm Password" required>
			</div>	
		</div><!-- form-group -->

		
		<div class="form-group row">
			<label for="user_address" class="col-md-2"><?php echo $lang['address']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-6">
				<textarea class="form-control" rows="3"  name="user_address" id="user_address" placeholder="User Address" required></textarea>
			</div>
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="user_contact" class="col-md-2"><?php echo $lang['contact_no']; ?>.:<span class="red_star">*</span></label>
			<div class="col-md-4" ng-class="{ 'has-error' : signup_form.user_contact.$invalid && !signup_form.user_contact.$pristine }">
				<!-- <p ng-show="signup_form.user_contact.$error.minlength" class="help-block">Invalid Contact No.(10-digits only)</p>
				<p ng-show="signup_form.user_contact.$error.maxlength" class="help-block">Invalid Contact No.(10-digits only)</p> -->
				<input type="number" class="form-control" name="user_contact" id="user_contact" ng-model="user.user_contact" autocomplete="off" placeholder="Contact No." required>
			</div>	
			<label for="user_email" class="col-md-2"><?php echo $lang['email']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-4" ng-class="{ 'has-error' : signup_form.user_email.$invalid && !signup_form.user_email.$pristine}">
				<p ng-show="signup_form.user_email.$invalid && !signup_form.user_email.$pristine" class="help-block">Enter a valid email.</p>
				<input  type="email" class="form-control" name="user_email" id="user_email" ng-model="user.user_email" ng-minlength="5" autocomplete="off" placeholder="User Email" required>
			</div>
		</div><!-- form-group -->


		<div class="form-group row" >
			<label for="user_ref_name" class="col-md-2"><?php echo $lang['ref_name']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-10" ng-class="{ 'has-error' : signup_form.user_ref_name.$invalid && !signup_form.user_ref_name.$pristine}">
				<p ng-show="signup_form.user_ref_name.$invalid && !signup_form.user_ref_name.$pristine" class="help-block"></p>
				<input  type="text" class="form-control" name="user_ref_name" id="user_ref_name" ng-model="user.user_ref_name" ng-minlength="5" autocomplete="off" placeholder="User Reference Name" required>
			</div>	
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="user_ref_email" class="col-md-2"><?php echo $lang['ref_email']; ?>:<span class="red_star">*</span></label>
			<div class="col-md-10" ng-class="{ 'has-error' : signup_form.user_ref_email.$invalid && !signup_form.user_ref_email.$pristine }" >
				<p ng-show="signup_form.user_ref_email.$invalid && !signup_form.user_ref_email.$pristine" class="help-block">Enter a valid email.</p>
				<input type="email" class="form-control" name="user_ref_email" id="user_ref_email" ng-model="user.user_ref_email" autocomplete="off" placeholder="User Reference Email" required>
			</div>	
		</div><!-- form-group -->

		<div class="form-group row ">
			<label for="bt" class="col-md-2"></label>
			<div class="col-md-10">
				<input onclick="return signUp('#signup')" ng-disabled="signup_form.$invalid" type="submit" class="btn btn-info  btn-lg custom_btn" name="c_submit" value="<?php echo $lang['submit']; ?>">
				<input type="reset" class="btn btn-info  btn-lg custom_btn" name="c_clear" value="<?php echo $lang['clear']; ?>">
				<!-- <p class="login_here">Already have an account? <a href="index">Login Here</a></p> -->
			</div>
		</div><!-- form-group -->
		<br>
			</form>
		<div class="show_note">
			<center><h4 id="show"></h4>
			<button class="btn btn-info  btn-lg custom_btn try_again" >Try Again</button>
			</center>
		</div><!-- show_note -->
	<!-- </div> --><!-- signup_form -->
	</div><!-- col-md-8 col-md-offset-2 outer_sign --><br><br><br>

	</div><!-- container main_containt-->
	<div class="container footer">
		<footer class="col-md-12"><br>
			<p class="col-md-6 row">© CHAIN-EL INFOSYSTEM PVT. LTD. All rights reserved - 2015</p>
		</footer>
	</div>
<script>
$(document).ready(function(){
	$('#loader_container').hide();
	$(".show_note").hide();
    $(".try_again").click(function(){
        // $('.show_note #show').html('');
		$('.signup').show();
		$(".show_note").hide();
		
    });
});
</script>

<script type="text/javascript">
function signUp(form_id){
		var form_id=form_id;
		var dataString = $(form_id).serialize()+'&form_id='+form_id;
		console.log(dataString);
		$.ajax({
			type:"POST",
			url:"php/save.php",
			data:dataString,
			cache:true,
			beforeSend:function() {
				$('#loader_container').show();
				$('#loader').addClass('loader');
				$('body').addClass('body');
			},
			success:function(response) {
				
			// $("input[type=text],input[type=email],input[type=number],input[type=password],input[type=radio],select, textarea").val("");
				var text='Request successfull, Please check your mail to activate your account!.';
				// var res=response;
				// console.log(res);
				// if (res!='Invalid email or not exist!') {
				// 	alert('not equal');
				// }else{alert('equal');}
				setTimeout(function() {
				   	$('#loader').removeClass('loader');
			   		$('body').removeClass('body');
			   		$('#loader_container').hide();
				    if(response){
					$('#show').html(response);
					$('.signup').hide();
					$(".show_note").delay(1000).show();
						return true;
					}else{alert(response); }
				}, 2000);

				
			}
		});
		return false;
}

$(document).ready(function(){
   var url = 'php/option_location.php';
      $.getJSON(url, function(data) {
          $.each(data, function(index, data) {

	$('select#location').append("<option value=" + data.location_code +">"+data.location_name+"</option>");
	// alert(data);

    });
 
   });
});        
</script>


<script>
// client form validation with angular js
	var validationApp = angular.module('validationApp', []);

	// create angular controller
	validationApp.controller('mainController', function($scope) {

		// function to submit the form after all validation has occurred			
		$scope.submitForm = function() {
			// $scope.name='';
			
		};

	});
</script>
</body>
</html>