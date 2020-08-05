<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">
$(document).ready(function() {

	$('#userkey').on('input', function() {
		var searchKeyword = $(this).val();
		if (searchKeyword.length >= 1) {
			$.post('php/search.php', { userkey: searchKeyword }, function(data) {
          	$('tbody#ucontent').empty()
          // $('tr#content2').empty()
          $.each(data, function() {
			// alert('hello');
          	// $('tbody#content').append('<tr><td><a href="index.php?id=' + this.id + '">' + this.id + '</td> <td>' + this.title + '</td></tr>');
            
             $('tbody#ucontent').append('<tr> <td data-dismiss="modal"> <a class=""  type="button" onclick="editFunctionForUser(\''+this.id+'\' )">'+this.id+''+'</a></td> <td>'  + this.id + '</td> <td>' + this.title + '</td></tr>')
          	
            // $('td#content2').append(this.title);
            
          });
        }, "json");
		}
	});
});
function editFunctionForUser(id) {
	var dataString = 'user_code='+ id;
		$.ajax({
			type:"POST",
			url:"php/fill_user_form.php",
			data:dataString,
			cache:false,
			
			success:function(response) {
			// document.getElementById('test2').innerHTML=response;
			$( "#user_code" ).prop( "readOnly", true );
			// console.log(response);
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
<body>
<div class="container">
<!-- <p id='msgu'></p> -->
<!-- User form begin here -->
<div class="col-md-offset-2 user_form row">
	<center><h3><?php echo $lang['user_form']; ?></h3></center>
	<form action="" method="POST" name="user_form" id="user_frm">
		<div class="form-group row">
			<label for="user_name" class="col-md-2"><?php echo $lang['user_name']; ?></label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="user_name" id="user_name" autocomplete="off" required>
			</div>	
			<label for="user_code" class="col-md-2"><?php echo $lang['user_code']; ?></label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="user_code" id="user_code" autocomplete="off" required>
			</div>
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="client_code_user" class="col-md-2"><?php echo $lang['client_code']; ?></label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="client_code_user" id="client_code_user" autocomplete="off" required>
			</div>	
			<label for="password" class="col-md-2"><?php echo $lang['password']; ?></label>
			<div class="col-md-4">
				<input type="password" class="form-control" name="password" id="password"  required>
			</div>
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="admin" class="col-md-2"><?php echo $lang['is_admin']; ?></label>
			<div class="col-md-4">
				<input type="radio" class="" name="admin" value="1" id="admin">Yes
				<input type="radio" class="" name="admin" value="0" id="admin" checked>No
			</div>	
		</div><!-- form-group -->
		<div class="form-group row">
			<label for="user_contact" class="col-md-2"><?php echo $lang['user_contact']; ?></label>
			<div class="col-md-4">
				<input type="number" class="form-control" name="user_contact" id="user_contact" autocomplete="off" required>
			</div>	
			<label for="email_address" class="col-md-2"><?php echo $lang['email']; ?></label>
			<div class="col-md-4" >
				<input type="email" class="form-control" name="email_address" id="email_address" autocomplete="off" required>
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row ">
		<label for="bt" class="col-md-2"> </label>
			<div class="col-md-7 ">
				<input onclick="return saveFormData('#user_frm')" type="submit" class="btn btn-success  btn-lg custom_btn" name="u_save" value="<?php echo $lang['save']; ?>">
				<!-- <input onclick="return updateFormData('#user_frm',window.prim_id)" type="submit" class="btn btn-success  btn-lg " name="u_update" value="Update"> -->
				<input type="reset" class="btn btn-info  btn-lg custom_btn" name="u_clear" value="<?php echo $lang['clear']; ?>">
				<button type="button" class="btn btn-info btn-lg custom_btn" data-toggle="modal" data-target="#userModal"><?php echo $lang['list']; ?></button>
			</div>
	</div><!-- form-group -->
	<form>
</div><!-- user_form -->
<!--User_form Modal -->
<div id="userModal" class="modal fade " role="dialog">
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
			<label for="userkey" class="col-md-2"><?php echo $lang['filter']; ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="filter" id="userkey" required>
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
		        <th><?php echo $lang['client_code']; ?></th>
		        <th><?php echo $lang['client_name']; ?></th>
		      </tr>
		      <tbody id="ucontent" class="scroll">
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
<!-- User form end here -->

<div class="row">
	<div class="table-responsive  col-md-12 approve_user">
			<table class="table">
			<caption><?php echo $lang['requested_users_list']; ?></caption>
				<tr class="success">
				  <!-- <th></th> -->
				  <th><?php echo $lang['user_code']; ?></th>
				  <th><?php echo $lang['name']; ?></th>
				  <th><?php echo $lang['location']; ?></th>
				  <th><?php echo $lang['address']; ?></th>
				  <th><?php echo $lang['contact']; ?></th>
				  <th><?php echo $lang['email']; ?></th>
				  <th><?php echo $lang['ref_name']; ?></th>
				  <th><?php echo $lang['ref_email']; ?></th>
				  <th><?php echo $lang['do']; ?></th>
				</tr>
			 	<tbody id="pending_user">
			 	</tbody>
				<!-- <tbody id="tablebody1"></tbody>  -->
			</table>
		</div><!-- order_tables -->

</div><!-- row -->
</div><!-- container --><br><br><br><br><br>

<script type="text/javascript">
// $(document).ready(function(){
// 	$.ajax({ 
// 	    type: 'POST', 
// 	    url: 'php/fill_requsted_user_tbl.php', 
// 	    // data: { get_param: 'value' }, 
// 	    dataType:'json',
// 	    success: function (data) { 
// 	    	alert(data);
// 	                        // var names = data
// 	        $('#pending_user').html(data);
// 	    }
// 	});
// });
$(document).ready(function(){
	var i=1;
var url = 'php/fill_requsted_user_tbl.php';
	$.getJSON(url, function(data) {
		$.each(data, function(index, data) {
			// $('tbody#pending_user').append(this);

		$('tbody#pending_user').append('<tr><td>'  + this.user_code+ '</td> <td>' + this.user_name +'</td> <td>'+this.user_location
		+ '</td> <td>'+ this.user_address +'</td> <td>' + this.user_contact 
		+'</td> <td>'+ this.user_email +'</td> <td>' + this.user_ref_name 
		+'</td> <td>'+ this.user_ref_email +'</td> <td onclick="Remove(this.id)" id="app'+i+'" ><a  onclick="approveUsers(\''+this.user_code+'\' )">Approve <br></a><a onclick="removeUsers(\''+this.user_code+'\' )">Delete</a>'+ '</td></tr>')
		i++;
		});

	});
});

function approveUsers (user_code) {
	// alert("hi " +user_code);
	var form_id="approve";
	var user_code=user_code;
	
	var dataString='user_code='+user_code+'&form_id='+form_id;
	// alert(dataString);
	$.ajax({
		type:"POST",
		url:"php/save.php",
		data:dataString,
		cache:true,
		success:function(response) {
			alert(response);

		}
	});
}
function removeUsers (user_code) {
	// alert("hi " +user_code);
	var form_id="delete";
	var user_code=user_code;
	
	var dataString='user_code='+user_code+'&form_id='+form_id;
	// alert(dataString);
	$.ajax({
		type:"POST",
		url:"php/save.php",
		data:dataString,
		cache:true,
		success:function(response) {
			alert(response);

		}
	});
}
</script>

<?php 
$activation=11032015074941;
$user ='bond1234';
$Email="db@gmail.com";
$message = " To activate your account, please click on this link:\n\n";

// $message .= WEBSITE_URL . 'php/activate.php?email=' . urlencode($Email) . "&key=$activation";
// $message =   'php/activate.php?email=' . urlencode($Email) . "&key=$activation";



 // echo '<a href="php/activate.php?key="'. $activation.'>click here</a>';
 ?>
 <!-- <a href="php/activate.php?user=<?php echo $user;?>&key=<?php echo $activation; ?>">to veryfi click here</a> -->
</body>
</html>
