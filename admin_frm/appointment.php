<!DOCTYPE html>
<html>
<head> </head>
<body>
<div class="container">
	<div class="row">
		<div class="table-responsive  col-md-12 approved_order_list">
		<p onclick="appointmentStatusTbl()" class="pointer"><img src="images/reload.png">Refresh</p>
			<table class="table table-striped table-bordered table-hover" >
				<caption><?php echo $lang['appointment_status']; ?></caption>
				<thead>
					<tr class="success">
					 	<th><?php echo $lang['date_of_attend']; ?></th>
					 	<th><?php echo $lang['user_code']; ?></th>
						<th><?php echo $lang['remarks']; ?></th>
						<th><?php echo $lang['kind_of_visit']; ?></th>
						<th><?php echo $lang['requested_employee']; ?></th>
						<th><?php echo $lang['login_info']; ?></th>
						<th><?php echo $lang['attended']; ?></th>
						<th><?php echo $lang['do']; ?></th>
					</tr>
			  	</thead>		  	
				<tbody id="appointment_tbl"></tbody>
			</table>
		</div><!-- order_tables -->
	</div><!-- row -->
</div><!-- container -->
<script type="text/javascript">
$(document).ready(function(){
	appointmentStatusTbl();
});
function appointmentStatusTbl(){
$('tbody#appointment_tbl').empty();
var i=1;
var url = 'php/fill_appointment_tbl.php';
	$.getJSON(url, function(data) {
		$.each(data, function(index, data) {
		$('tbody#appointment_tbl').append('<tr><td>'  + this.appointment_date
			+ '</td> <td>'+ this.user_code + '</td> <td>' + this.remarks +'</td> <td>'+this.kind_of_visit
		+ '</td> <td>' + this.requested_employee +'</td><td>'+ this.login_info +'</td><td>' + this.attendent 
		+'</td><td><a  onclick="openAppointment(\''+this.id+'\' )">Open <br></a><a onclick="closeAppointment(\''+this.id+'\' )">Close</a>'+ '</td></tr>')
		// +'</td><td onclick="Remove(this.id)" id="app'+i+'" ><a  onclick="openAppointment(\''+this.id+'\' )">Open <br></a><a onclick="closeAppointment(\''+this.id+'\' )">Close</a>'+ '</td></tr>')
		i++;
		});
	});
}
function openAppointment(app_id){
	var form_id='open_appointment';
	var dataString='form_id='+form_id+'&app_id='+app_id;
	$.ajax({
		type:"POST",
		url:"php/save.php",
		data:dataString,
		cache:false,
		beforeSend:function(){
			$('#loader_container').show();
			$('#loader').addClass('loader');
			$('body').addClass('body');
		},
		success:function(response){
			setTimeout(function(){
				$('#loader').removeClass('loader');
				$('body').removeClass('body');
				$('#loader_container').hide();
				alert(response);
				appointmentStatusTbl();
			},2000);
			
		}
	});
}
function closeAppointment(app_id){
	var form_id='close_appointment';
	var dataString='form_id='+form_id+'&app_id='+app_id;
	$.ajax({
		type:"POST",
		url:"php/save.php",
		data:dataString,
		cache:false,
		beforeSend:function(){
			$('#loader_container').show();
			$('#loader').addClass('loader');
			$('body').addClass('body');
		},
		success:function(response){
			setTimeout(function(){
				$('#loader').removeClass('loader');
				$('body').removeClass('body');
				$('#loader_container').hide();
				alert(response);
				appointmentStatusTbl();
			},2000);
			
		}
	});
}
</script>
</body>
</html>