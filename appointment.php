<!DOCTYPE html>
<html>
<head>
<title>Chainel Infosystem Pvt. Ltd.</title>
<?php 
	include 'res/header.html';

session_start();
ini_set('display_errors',0);
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
<link href="css/jquery-ui.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script language="javascript">
$(document).ready(function () {
    $("#app_date").datepicker({
        minDate: 0,
        maxDate: 6,
        dayNamesShort:true,
        // dateFormat: "mm/dd/yy",  //Date format change here.
        // beforeShowDay: $.datepicker.noWeekends//disable weekends
    });
});
</script>
<style type="text/css">
	.form-group{display: block;position: inherit;}
</style>
</head>
<body>
<div class="container main_containt">
<header><?php include 'header.php'; ?></header>
<div class="col-md-3 row">
<?php include 'user_menu.php'; ?>
</div><!-- col-md-3 -->
<div class="col-xs-12 col-md-8">
	<!-- <h3 class="text_shadow pull-left">Change Password</h3> -->
	<div class="appointment_form row">
	 <div id="loader_container"><p id="loader">Wait...</p></div>
		<form action="" method="POST" id="appointment_frm">
		<!-- <div id="msg"></div> -->
			<label for="kov" class="col-md-6"><?php echo $lang['kind_of_visit']; ?>:</label>
			<div class="form-group col-md-5">
				<select class="form-control" name="kov" id="kov" required>
					<option value="Not Selected">--<?php echo $lang['select']; ?>--</option>
					<option value="<?php echo $lang['by_online']; ?>"><?php echo $lang['by_online']; ?></option>
					<option value="<?php echo $lang['by_personal']; ?>"><?php echo $lang['by_personal']; ?></option>
				</select>
			</div>

			<label for="req_emp" class="col-md-6"><?php echo $lang['requested_employee']; ?>:</label>
			<div class="form-group  col-md-5">				
				<select class="form-control " name="req_emp" id="req_emp" required>
					<option value="Not Selected">--<?php echo $lang['select']; ?>--</option>
					<?php require_once "php/connect_pdo.php";
					$result=$db->prepare("SELECT * FROM request_emp"); 
					$result->execute();
					foreach ($result->fetchAll() as $row) {?>
					<option value="<?php echo $row['email']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
				</select>
			</div>

			<label for="app_date" class=" col-md-6"><?php echo $lang['date']; ?>:</label>
			<div class="form-group col-md-5">
			  <input class="form-control" name="app_date" id="app_date" autocomplete="off">
			</div>
			
			<label for="remarks" class=" col-md-6"><?php echo $lang['remarks']; ?>:</label>
			<div class="form-group col-md-5">
			  <input type="text" class="form-control"name="remarks" id="remarks" autocomplete="off">
			</div>
			<label for="login_info" class=" col-md-6"><?php echo $lang['login_info']; ?>:</label>
			<div class="form-group col-md-5">
			  <textarea class="form-control"name="login_info" id="login_info"></textarea> 
			</div>
			<!-- <br><br><br><br> -->
			<label for="bt" class="col-md-6"> </label>
			<div class="form-group col-md-5 row">
				<center><input onclick="return saveFormData('#appointment_frm')" type="submit" class="btn btn-success  btn-lg custom_btn" name="submit" value="<?php echo $lang['save']; ?>" >
				<input type="reset" class="btn btn-success  btn-lg custom_btn" name="clear" value="<?php echo $lang['clear']; ?>" ></center>
			</div>
		</form>
	</div><!-- appointment_form -->

	<div class="appointment_status bottom40px row">
		<p><a onclick="appointmentStatusTbl('Yes')"><?php echo $lang['attended'] ;?></a> || <a onclick="appointmentStatusTbl('No')"><?php echo $lang['not_attended']; ?></a></p>
		<div class="table-responsive modal_fixed_height">		
			<table class="table  table-striped table-bordered table-hover">
			<caption><?php echo $lang['appointment_status']; ?></caption>
				<thead>
				 <tr class="success">
					<th><?php echo $lang['date_of_attend']; ?></th>
					<th><?php echo $lang['remarks']; ?></th>
					<th><?php echo $lang['kind_of_visit']; ?></th>
					<th><?php echo $lang['requested_employee']; ?></th>
					<th><?php echo $lang['attended']; ?></th>
				 </tr>
				</thead>
				<tbody id="appointment_tbl"></tbody>
			</table>
		</div>
	</div><!-- 	appointment_status -->
</div><!-- col-md-7 -->
		
</div><!-- loader_container -->
<div class="container footer"></div>
<script type="text/javascript">
$(document).ready(function(){
	appointmentStatusTbl('No');
	$('#app_date').on('change', function(){
		var d = new Date();
		// alert(d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate());
		var d1 = d.getDate();
		var d2 = $(this).val();
		d2 = d2.slice(3, 5);
		var diff = (d2-d1);
		if (diff>=0) {
		}else{
			alert("Previous Date Not Allowed! ");
			$(this).val('');
		}
	});

});
function appointmentStatusTbl(status){
	$('tbody#appointment_tbl').empty();
	// var status='';
	var dataString = 'status='+ status;
	var i=0;
	$.ajax({
		type:"POST",
		url:"php/fill_user_appointment_tbl.php",
		data:dataString,
		cache:false, 
		success:function(response) {
			// console.log(response);
			if (response=='[]') {
				// alert('No record found!');
				var data="<tr  rowspan='5'><td></td><td></td><td><h4><center>No record found!</center></h4></td><td></td><td></td></tr>";
				$('tbody#appointment_tbl').append(data);
			}
			var json_obj = $.parseJSON(response);
			for (var j = 0; i < json_obj.length; j++) {
				var data="<tr><td>"  + json_obj[j].appointment_date + "</td> <td>" + json_obj[j].remarks +"</td>"
				data+="<td>"+json_obj[j].kind_of_visit + "</td> <td>" + json_obj[j].requested_employee +"</td><td>" 
					+ json_obj[j].attendent +"</td></tr>";
				$('tbody#appointment_tbl').append(data);
			i++;	
			}
			
			
		}
	});
}
</script>
<?php 
require_once "php/connect_pdo.php";
$result=$db->prepare("SELECT MAX(id) as max_id FROM appointment WHERE user_code=:user_code");
$result->bindParam(':user_code', $_SESSION['user_id']);
$result->execute();
foreach ($result->fetchAll() as $row) {
	$max_id= $row['max_id'];
}
$result=$db->prepare("SELECT * FROM appointment WHERE id=:id");
$result->bindParam(':id', $max_id);
$result->execute();
foreach ($result->fetchAll() as $row) {
	$login_info= $row['login_info'];
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#login_info').val('<?php echo  $login_info;?>');
		$('#previous_record').on('click', function(){
		$('#login_info').val('<?php echo  $login_info;?>');
		});
	});
</script>
</body>
</html>