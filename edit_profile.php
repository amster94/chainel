<!DOCTYPE html>
<html>
<head>
 <title>Chainel Infosystem Pvt. Ltd.</title>
<?php 
ini_set('display_errors',0);
include 'res/header.html';
session_start();
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#loader_container').hide();
	});
</script>
</head>
<!-- <div id="test2">eco</div> -->
<script type="text/javascript">
function fetchList() {
	var id='<?php  echo $_SESSION['user_id']; ?>';
	var client_code_user='<?php echo $_SESSION['client_code_user']; ?>';
	window.prim_id=id;
	var dataString = 'client_code='+ id+'&client_code_user='+ client_code_user;
	// document.getElementById('test1').innerHTML=dataString;
		$.ajax({
			type:"POST",
			url:"php/fill_client_register_form.php",
			data:dataString,
			cache:true,
			success:function(response) {
			// document.getElementById('test2').innerHTML=response;
			// alert(response);
			$( "#client_code" ).prop( "readOnly", true );
			var result = $.parseJSON(response);//parse JSON
			// alert(response);
				$.each(result, function(key, value){
				    $.each(value, function(key, value){
					$("input[type=text],input[type=email],input[type=number], input[name=user_save], select, textarea").show();
					$("[id$=Text]").hide();
				        // console.log(key, value);
				        $('#'+key).val(value);
				        // $('#'+key).text(value);
				    });
				});
			}
		});
}

$(document).ready(function(){
	$("input[type=text],input[type=email],input[type=number], input[name=user_save], select, textarea").hide();

	var id='<?php  echo $_SESSION['user_id']; ?>';
	var client_code_user='<?php echo $_SESSION['client_code_user']; ?>';
	var dataString = 'client_code='+ id+'&client_code_user='+ client_code_user;
    // alert(dataString);
    $.ajax({
    type:"POST",
	url:"php/fill_client_register_form.php",
	data:dataString,
	cache:true, 
		success:function(response) {
		// document.getElementById('test2').innerHTML=response;
		console.log(response);
		var JSONObj = $.parseJSON(response);
		 // alert(JSONObj);
		// $("#client_code").text(JSONObj[0][1]);
		$("[id$=Text]").addClass("customtext");
		$("#client_code_Text").text(JSONObj[0].client_code);
		$("#name_Text").text(JSONObj[0].name);
		$("#location_Text").text(JSONObj[0].location);
		$("#address_Text").text(JSONObj[0].address);
		$("#tel_Text").text(JSONObj[0].tel);
		$("#user_email_Text").text(JSONObj[0].user_email);
		$("#ref_name1_Text").text(JSONObj[0].ref_name1);
		$("#ref_name2_Text").text(JSONObj[0].ref_name2);
		$("#ref_name3_Text").text(JSONObj[0].ref_name3);
		$("#ref_name4_Text").text(JSONObj[0].ref_name4);
		$("#email1_Text").text(JSONObj[0].email1);
		$("#email2_Text").text(JSONObj[0].email2);
		$("#email3_Text").text(JSONObj[0].email3);
		$("#email4_Text").text(JSONObj[0].email4);
		// console.log(JSONObj[0].name);
		}
	});
});
</script> 
<div class="container main_containt">
<script type="text/javascript">
	$(document).ready(function(){
	// $("header").load("res/header_user.php"); 

});
</script>
<body>

<header><?php include 'header.php'; ?></header>
<div class="col-md-3 row">
<?php include 'user_menu.php'; ?>
</div><!-- col-md-3 -->

<div class="col-md-7 row">
	<div class=" edit_client_form row"><br><br>
	<div id="loader_container"><p id="loader">Wait...</p></div>
		<form action="" method="POST" name="client_form" id="user_profile_form">

		<div class="form-group row">
		<div class="col-md-6">
			<h3 class="text_shadow pull-left"><?php echo $lang['edit_user_profile']; ?></h3>
	<button class="btn btn-success  btn-md user_form_btn custom_btn" onclick="fetchList()"><?php echo $lang['edit']; ?></button>
	
		</div>
			<label for="location" class="col-md-2"><?php echo $lang['location']; ?></label>
			<div class="col-md-4">
				<select class="form-control" name="location" id="location" required>
					<option value="Not Selected">--Location Code--</option>
				</select>
				<p id="location_Text"></p>
			</div>
		</div><!-- form-group -->

		<div class="form-group row" >
			<label for="client_code" class="col-md-2"><?php echo $lang['client_code']; ?></label>
			<div class="col-md-4">
				<input type="text" id="client_code" class="form-control" name="client_code" autocomplete="off" required>
				<p id="client_code_Text"></p>
			</div>	
			<label for="name" class="col-md-2"><?php echo $lang['name']; ?></label>
			<div class="col-md-4" >
				<input  type="text" class="form-control" name="name" id="name"  autocomplete="off" required>
				<p id="name_Text"></p>
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="address" class="col-md-2"><?php echo $lang['address']; ?></label>
			<div class="col-md-4">
				<textarea class="form-control"  name="address" id="address" required></textarea>
				<p id="address_Text"></p>
			</div>
		</div><!-- form-group -->
		<div class="form-group row"  >
			<label for="tel" class="col-md-2"><?php echo $lang['telephone']; ?></label>
			<div class="col-md-4">
				<input type="number" class="form-control" name="tel" id="tel"  autocomplete="off" min="0" required>
				<p id="tel_Text"></p>
			</div>	
			<label for="user_email" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4" >
				<input type="email" class="form-control" name="user_email" id="user_email"  autocomplete="off" required>
				<p id="user_email_Text"></p>
			</div>
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="ref_name1" class="col-md-2"><?php echo $lang['refrence']; ?> 1:</label>
			<div class="col-md-4">
				<input  type="text" class="form-control" name="ref_name1" id="ref_name1" autocomplete="off" required>
				<p id="ref_name1_Text"></p>
			</div>
			<label for="email1" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div>
				<div class="col-md-4" >
					<input type="email" class="form-control" name="email1" id="email1" autocomplete="off" required>
					<p id="email1_Text"></p>
				</div>	
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="ref_name2" class="col-md-2"><?php echo $lang['refrence']; ?> 2:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="ref_name2" id="ref_name2" autocomplete="off" required>
				<p id="ref_name2_Text"></p>
			</div>
			<label for="email2" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4">
				<input type="email" class="form-control" name="email2" id="email2" autocomplete="off" required>
				<p id="email2_Text"></p>
			</div>
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="ref_name3" class="col-md-2"><?php echo $lang['refrence']; ?> 3:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="ref_name3" id="ref_name3" autocomplete="off" required>
				<p id="ref_name3_Text"></p>
			</div>
			<label for="email3" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4">
				<input type="email" class="form-control" name="email3" id="email3" autocomplete="off" required>
				<p id="email3_Text"></p>
			</div>
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="ref_name4" class="col-md-2"><?php echo $lang['refrence']; ?> 4:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="ref_name4" id="ref_name4" autocomplete="off" required>
				<p id="ref_name4_Text"></p>
			</div>
			<label for="email4" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4">
				<input type="email" class="form-control" name="email4" id="email4" autocomplete="off" required>
				<p id="email4_Text"></p>
			</div>
		</div><!-- form-group -->
		<br>
		<div class="form-group row ">
		<label for="bt" class="col-md-2"> </label>
			<div class="col-md-6">
				<input onclick="return saveFormData('#user_profile_form',window.prim_id)" type="submit" class="btn btn-success btn-lg custom_btn" name="user_save" value="Save">
				<!-- <input type="reset" class="btn btn-info  btn-lg " name="c_clear" value="Clear"> -->
			</div>
		</div><!-- form-group -->
		<br>
		</form>
	
	</div><!-- client_form -->
</div><!-- col-md-8 -->
	

<!-- Client form end here -->

</div><!-- container -->
<div class="container footer"></div>
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
 <?php 
session_start();
ini_set('display_errors',0);
$email =$_SESSION['user_email'];
$pwd =$_SESSION['u_password'];
?>
<script type="text/javascript">
 $(document).ready(function(){
        var luser='<?php echo $email; ?>';
        var lpasswd='<?php echo $pwd; ?>';
        var dataString = 'luser='+ luser+'&lpasswd='+ lpasswd;
        // alert(dataString);
        $.ajax({
            type:"POST",
            url:"ticket/login.php",
            data:dataString,
            cache:true,
            success:function(response) {
                // $('#clientLogin').hide();
                // document.getElementById('msgc').innerHTML=response;// alert(response);
                 // document.location.reload(true);
                 // window.location.reload(true);
               // $(location).attr('href', 'http://localhost/project/chainel/ticket/tickets.php')
                // window.location.href = 'http://localhost/project/chainel/ticket/tickets.php';
                // window.location.href = 'http://chain-el.com/ticket/tickets.php';
            }
        });    
 });
</script>
</body>
</html>