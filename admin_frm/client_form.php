<!DOCTYPE html>
<html>
<head>
<!--js for live search for client form-->
<script type="text/javascript">
	$(document).ready(function() {
		$('#keyword').on('input', function() {
			var searchKeyword = $(this).val();
			if (searchKeyword.length >= 1) {
				$.post('php/search.php', { keywords: searchKeyword }, function(data) {
	          	$('tbody#content').empty()
	          // $('tr#content2').empty()
	          $.each(data, function() {

	          	// $('tbody#content').append('<tr><td><a href="index.php?id=' + this.id + '">' + this.id + '</td> <td>' + this.title + '</td></tr>');
	            
	             $('tbody#content').append('<tr> <td data-dismiss="modal"> <a id="12" onclick="editFunctionForClient(\''+this.id+'\', this.id)">'+this.id+''+'</a></td> <td>'  + this.id + '</td> <td>' + this.title + '</td></tr>')
	          	
	            // $('td#content2').append(this.title);
	            
	          });
	        }, "json");
			}
		});
	});
// Edit from selected row
function editFunctionForClient(id) {
	// document.getElementById('test1').innerHTML=id;
	// alert(i);
	window.prim_id=id;
	var dataString = 'client_code='+ id;
		$.ajax({
			type:"POST",
			url:"php/fill_client_form.php",
			data:dataString,
			cache:true,
			success:function(response) {
				// document.getElementById('msgc').innerHTML=response;// alert(response);
				$( "#client_code" ).prop("readOnly", true);

				var result = $.parseJSON(response);//parse JSON
				$.each(result, function(key, value){
				    $.each(value, function(key, value){
				        // console.log(key, value);
				        $('#'+key).val(value);	
				    });
				});
			}
		});

}
</script>
</head>
<!-- <div id="test2">eco</div> -->
<body>
<div class="container">
<p id='msgc'></p>
<!-- client form begin here. -->
	<div class=" col-md-offset-2 client_form row">
		<center><h3><?php echo $lang['client_form']; ?></h3></center>
		<form class="" action="" method="POST" name="client_form" id="client_form" ng-app="validationApp" ng-controller="mainController" ng-submit="submitForm()" novalidate>
		<!-- <legend>CLIENT FORM</legend> -->
		
		<div class="form-group row ">
			<div class="col-md-6"></div>
			
			<label for="location1" class="col-md-2"><?php echo $lang['location']; ?></label>
			<div class="col-md-4">
				<select class="form-control" name="location" id="location1" required>
					<option value="Not Selected">--<?php echo $lang['location_code']; ?>--</option>
				</select>
			</div>
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="client_code" class="col-md-2"><?php echo $lang['client_code']; ?></label>
			<div class="col-md-4"  ng-class="{ 'has-error' : client_form.client_code.$invalid && !client_form.client_code.$pristine }">
				<input type="text" id="client_code" class="form-control" name="client_code"  ng-model="user.cl_code" ng-minlength="10" ng-maxlength="10" autocomplete="off" required>
			</div>	
				<!-- <p ng-show="client_form.client_code.$error.minlength" class="help-block">Client code is too short.</p> -->
				<!-- <p ng-show="client_form.client_code.$error.maxlength" class="help-block">Client code is too long.</p> -->
			
			<label for="name" class="col-md-2"><?php echo $lang['name']; ?></label>
			<div class="col-md-4" ng-class="{ 'has-error' : client_form.name.$invalid && !client_form.name.$pristine}">
				<input  type="text" class="form-control" name="name" id="name" ng-model="user.name" ng-minlength="5" autocomplete="off" required>
			</div>	
				<!-- <p ng-show="client_form.name.$error.minlength" class="help-block">User name should be min 5 char</p> -->
		</div><!-- form-group -->
		
		<div class="form-group row" >
			<label for="tel" class="col-md-2"><?php echo $lang['telephone']; ?></label>
			<div class="col-md-4"  ng-class="{ 'has-error' : client_form.tel.$invalid && !client_form.tel.$pristine }">
				<input type="number" class="form-control" name="tel" id="tel" ng-model="user.tel" ng-minlength="10" ng-maxlength="10" autocomplete="off" required>
			</div>	
				<!-- <p ng-show="client_form.tel.$error.minlength" class="help-block">Invalid Telephone No.(10-digits only)</p> -->
				<!-- <p ng-show="client_form.tel.$error.maxlength" class="help-block">Invalid Telephone No.(10-digits only)</p> -->
			<label for="user_email" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4"   ng-class="{ 'has-error' : client_form.user_email.$invalid && !client_form.user_email.$pristine }">
				<input type="email" class="form-control" name="user_email" id="user_email" ng-model="user.user_email" autocomplete="off" required>
			</div>	
			<!-- <p ng-show="client_form.user_email.$invalid && !client_form.user_email.$pristine" class="help-block">Enter a valid email.</p> -->
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="address" class="col-md-2"><?php echo $lang['address']; ?></label>
			<div class="col-md-4">
				<textarea class="form-control" rows="5" name="address" id="address" required></textarea>
			</div>
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="ref_name1" class="col-md-2"><?php echo $lang['refrence']; ?> 1:</label>
			<div class="col-md-4">
				<input  type="text" class="form-control" name="ref_name1" id="ref_name1" autocomplete="off" required>
			</div>
			<label for="email1" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div  ng-class="{ 'has-error' : client_form.email1.$invalid && !client_form.email1.$pristine }">
				<div class="col-md-4" >
					<input type="email" class="form-control" name="email1" id="email1" ng-model="user.email1" autocomplete="off" required>
				</div>	
					<!-- <p ng-show="client_form.email.$invalid && !client_form.email.$pristine" class="help-block">Enter a valid email.</p> -->
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="ref_name2" class="col-md-2"><?php echo $lang['refrence']; ?> 2:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="ref_name2" id="ref_name2" autocomplete="off" required>
			</div>
			<label for="email2" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4">
				<input type="email" class="form-control" name="email2" id="email2" autocomplete="off" required>
			</div>
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="ref_name3" class="col-md-2"><?php echo $lang['refrence']; ?> 3:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="ref_name3" id="ref_name3" autocomplete="off" required>
			</div>
			<label for="email3" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4">
				<input type="email" class="form-control" name="email3" id="email3" autocomplete="off" required>
			</div>
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="ref_name4" class="col-md-2"><?php echo $lang['refrence']; ?> 4:</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="ref_name4" id="ref_name4" autocomplete="off" required>
			</div>
			<label for="email4" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4">
				<input type="email" class="form-control" name="email4" id="email4" autocomplete="off" required>
			</div>
		</div><!-- form-group -->
		<div class="form-group row ">
		<label for="bt" class="col-md-2"> </label>
			<div class="col-md-7">
				<input onclick="return saveFormData('#client_form')" type="submit" class="btn btn-success  btn-lg custom_btn" name="c_save" value="<?php echo $lang['save']; ?>">
				<input type="reset" class="btn btn-info  btn-lg custom_btn" name="c_clear" value="<?php echo $lang['clear']; ?>">
				<input  type="button" class="btn btn-info btn-lg custom_btn" data-toggle="modal" data-target="#myModal" value="<?php echo $lang['list']; ?>">
				<!-- <button  type="button" class="btn btn-info btn-lg custom_btn" data-toggle="modal" data-target="#myModal">List</button> -->
			</div>
		</div><!-- form-group -->
		<br>
	</form>
	
	</div><!-- client_form -->
<!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body ">
      <form action="" method="POST">
        <div class="form-group row">
			<label for="keyword" class="col-md-2"><?php echo $lang['filter']; ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="filter" id="keyword" required>
			</div>
			
			<!-- <div class="col-md-4">
				<input type="submit" class="btn btn-success btn-md" name="" value="Filter">
			</div> -->
		</div><!-- form-group -->
	  </form>	
	 			

		<div class="table-responsive modal_fixed_height">
		      <table class="table  table-striped table-bordered table-hover">
		      <tr class="success">
		        <th><?php echo $lang['edit']; ?></th>
		        <th><?php echo $lang['client_code']; ?></th>
		        <th><?php echo $lang['client_name']; ?></th>
		      </tr>
		      <tbody id="content" class="scroll">
			  </tbody>
		     </table>
		</div><!-- table-responsive -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang['close']; ?></button>
      </div>
    </div><!-- modal-content -->
    
  </div><!-- modal-dialog -->
</div><!-- 	modal fade -->
<!-- Client form end here -->

</div><!-- container --><br><br><br><br><br>

<script type="text/javascript">
// Script for fetching location code form filed location_code
$(document).ready(function(){
   var url = 'php/option_location.php';
      $.getJSON(url, function(data) {
          $.each(data, function(index, data) {

	$('select#location1').append("<option value=" + data.location_code +">"+data.location_name+"</option>");
	// alert(data);

    });
 
   });
});       
</script>
<script>
// client form validation with angular js
	// var validationApp = angular.module('validationApp', []);

	// // create angular controller
	// validationApp.controller('mainController', function($scope) {

	// 	// function to submit the form after all validation has occurred			
	// 	$scope.submitForm = function() {
	// 		// $scope.name='';
			
	// 	};

	// });
</script>
</body>
</html>