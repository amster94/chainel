<!DOCTYPE html>
<html>
<head>
 <title>Chainel Infosystem Pvt. Ltd.</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<script type="text/javascript" src="js/bootstrap.js"></script> 
	<script type="text/javascript" src="js/angular.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/custom-js.js"></script>
	 <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<!-- Inserting data into client table -->


</head>
<!-- <div id="test2">eco</div> -->

<body class="register_body_bg">
<div class="container">

<!-- client form begin here. -->
	<div class="row">
		<center><h3>CLIENT REGISTER FORM</h3></center>
		<p id='msgc'></p>
		<form id="client_register" class="register_form_bg" action="" method="POST" name="client_register_form" ng-app="validationApp" ng-controller="mainController" ng-submit="submitForm()" novalidate>
		<!-- <legend>CLIENT FORM</legend> -->
		<div class="form-group row" ng-class="{ 'has-error' : client_register_form.client_code.$invalid && !client_register_form.client_code.$pristine }">
			<label for="client_code" class="col-md-2">Client Code:</label>
			<div class="col-md-7">
				<input type="text" id="client_code" class="form-control" name="client_code"  ng-model="user.cl_code" ng-minlength="10" ng-maxlength="10" autocomplete="off" required>
			</div>	
				<p ng-show="client_register_form.client_code.$error.minlength" class="help-block">Client code is too short.</p>
				<p ng-show="client_register_form.client_code.$error.maxlength" class="help-block">Client code is too long.</p>
		</div><!-- form-group -->
		
		<div class="form-group row"ng-class="{ 'has-error' : client_register_form.name.$invalid && !client_register_form.name.$pristine}">
			<label for="name" class="col-md-2">Name:</label>
			<div class="col-md-7" >
				<input  type="text" class="form-control" name="name" id="name" ng-model="user.name" ng-minlength="5" autocomplete="off" required>
			</div>	
				<p ng-show="client_register_form.name.$error.minlength" class="help-block">User name should be min 5 char</p>
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="location" class="col-md-2">Location:</label>
			<div class="col-md-7">
				<select class="form-control" name="location" id="location" required>
					<option value="Not Selected">--Location Code--</option>
				</select>
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="address" class="col-md-2">Address:</label>
			<div class="col-md-7">
				<textarea class="form-control"  name="address" id="address" required></textarea>
			</div>
		</div><!-- form-group -->
		<div class="form-group row"  ng-class="{ 'has-error' : client_register_form.tel.$invalid && !client_register_form.tel.$pristine }">
			<label for="tel" class="col-md-2">Telephone:</label>
			<div class="col-md-4">
				<input type="number" class="form-control" name="tel" id="tel" ng-model="user.tel" ng-minlength="10" ng-maxlength="10" autocomplete="off" required>
			</div>	
				<p ng-show="client_register_form.tel.$error.minlength" class="help-block">Invalid Telephone No.(10-digits only)</p>
				<p ng-show="client_register_form.tel.$error.maxlength" class="help-block">Invalid Telephone No.(10-digits only)</p>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="ref_name1" class="col-md-2">Refrence 1:</label>
			<div class="col-md-3">
				<input  type="text" class="form-control" name="ref_name1" id="ref_name1" autocomplete="off" required>
			</div>
			<label for="email1" class="col-md-1">Email:</label>
			<div  ng-class="{ 'has-error' : client_register_form.email1.$invalid && !client_register_form.email1.$pristine }">
				<div class="col-md-3" >
					<input type="email" class="form-control" name="email1" id="email1" ng-model="user.email" autocomplete="off" required>
				</div>	
					<p ng-show="client_register_form.email.$invalid && !client_register_form.email.$pristine" class="help-block">Enter a valid email.</p>
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="ref_name2" class="col-md-2">Refrence 2:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="ref_name2" id="ref_name2" autocomplete="off" required>
			</div>
			<label for="email2" class="col-md-1">Email:</label>
			<div class="col-md-3">
				<input type="email" class="form-control" name="email2" id="email2" autocomplete="off" required>
			</div>
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="ref_name3" class="col-md-2">Refrence 3:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="ref_name3" id="ref_name3" autocomplete="off" required>
			</div>
			<label for="email3" class="col-md-1">Email:</label>
			<div class="col-md-3">
				<input type="email" class="form-control" name="email3" id="email3" autocomplete="off" required>
			</div>
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="ref_name4" class="col-md-2">Refrence 4:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="ref_name4" id="ref_name4" autocomplete="off" required>
			</div>
			<label for="email4" class="col-md-1">Email:</label>
			<div class="col-md-3">
				<input type="email" class="form-control" name="email4" id="email4" autocomplete="off" required>
			</div>
		</div><!-- form-group -->
		<br>
		<div class="form-group row ">
		<label for="bt" class="col-md-2"> </label>
			<div class="col-md-6">
				<input onclick="return saveFormData('#client_register')" ng-disabled="client_register_form.$invalid" type="submit" class="btn btn-success  btn-lg " name="c_submit" value="Submit">
				<input type="reset" class="btn btn-info  btn-lg custom_btn" name="c_clear" value="Clear">
			</div>
		</div><!-- form-group -->
		<br>
	</form>
	
	</div><!-- client_register_form -->

<!-- Client form end here -->

</div><!-- container --><br><br><br><br><br>


<script type="text/javascript">
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