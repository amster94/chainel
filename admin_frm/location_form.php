<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
// <!--js for live search for location form-->
$(document).ready(function() {
	$('#locationkey').on('input', function() {
		var searchKeyword = $(this).val();
		if (searchKeyword.length >= 1) {
			$.post('php/search.php', { locationkey: searchKeyword }, function(data) {
          	$('tbody#lcontent').empty()
          
          $.each(data, function() {

          	 //$('tbody#lcontent').append('<tr><td><a href="index.php?id=' + this.id + '">' + this.id + '</td> <td>' + this.title + '</td></tr>');
            
            $('tbody#lcontent').append('<tr> <td data-dismiss="modal"> <a class=""  type="button" onclick="editFunctionForLocation(\''+this.id+'\' )">'+this.id+'</a></td> <td>'  + this.id + '</td> <td>' + this.title + '</td></tr>')
          	
            // $('td#content2').append(this.title);
            
          });
        }, "json");
		}
	});
});

function editFunctionForLocation(id) {
	// document.getElementById('test1').innerHTML=id;
	window.prim_id=id;
	var dataString = 'location_code='+ id;
		$.ajax({
			type:"POST",
			url:"php/fill_location_form.php",
			data:dataString,
			cache:false,
			success:function(response) {
// document.getElementById('test1').innerHTML=response;
			$( "#location_codeCHID" ).prop( "readOnly", true );
			var result = $.parseJSON(response);//parse JSON
			// alert(response);
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
<body>
<div class="container">
<!-- <p id="test1"></p> -->
<p id='msg'></p>
<!-- Location form begin here -->
	<div class="col-md-offset-2 location_form row">
		<center><h3><?php echo $lang['client_location_form']; ?></h3></center>
		<form  action="" method="POST"  name="location_form" id="location_form">
		<div class="form-group row">
			<label for="location_code" class="col-md-3"><?php echo $lang['location_code']; ?></label>
			<div class="col-md-6" >
				<input  type="text" class="form-control" name="location_code" id="location_codeCHID" autocomplete="off" required>
			</div>
		</div><!-- form-group-->
		<div class="form-group row">		
			<label for="location_name" class="col-md-3"><?php echo $lang['location']; ?></label>
			<div class="col-md-6" >
				<input  type="text" class="form-control" name="location_name" id="location_name" autocomplete="off" required>
			</div>	
		</div><!-- form-group-->

		<div class="form-group row ">
		<label for="bt" class="col-md-2"> </label>
			<div class="col-md-7">
				<input onclick="return saveFormData('#location_form',window.prim_id)" type="submit" class="btn btn-success  btn-lg custom_btn" name="l_save" value="<?php echo $lang['save']; ?>">
				<input type="reset" class="btn btn-info  btn-lg custom_btn" name="l_clear" value="<?php echo $lang['clear']; ?>">
				<input type="button" class="btn btn-info btn-lg custom_btn" data-toggle="modal" data-target="#locationModal" value="<?php echo $lang['list']; ?>">
			</div>
		</div><!-- form-group -->
		</form>
		
	</div><!-- location_form -->
<!--location_form Modal -->
<div id="locationModal" class="modal fade " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body ">
      <form action="" method="POST">
        <div class="form-group row">
			<label for="locationkey" class="col-md-2"><?php echo $lang['filter']; ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="filter" id="locationkey" required>
			</div>
			
			<!-- <div class="col-md-3">
				<input type="submit" class="btn btn-success btn-md" name="" value="Filter">
			</div> -->
		</div><!-- form-group -->
	  </form>	
	 	<div class="table-responsive modal_fixed_height">
		      <table class="table  table-striped table-bordered table-hover">
		      <tr class="success">
		        <th><?php echo $lang['edit']; ?></th>
		        <th><?php echo $lang['location_code']; ?></th>
		        <th><?php echo $lang['location_name']; ?></th>
		      </tr>
		      <tbody id="lcontent" class="scroll">
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
<!-- Location form end here -->


</div><!-- container --><br><br><br><br><br>
<script>

// validation with angular js
	var lvalidationApp = angular.module('lvalidationApp', []);

	// create angular controller
	lvalidationApp.controller('lmainController', function($scope) {

		// function to submit the form after all validation has occurred			
		$scope.lsubmitForm = function() {
			// $scope.name='';
			
		};

	});

// Hide when clear button is clicked
// $(document).ready(function(){
//     $("[name=l_clear]").click(function(){
//         $("#msg").hide();
//     });
// });
</script>

</body>
</html>

