<!DOCTYPE html>
<html>
<head>
<!-- <title>Chainel Infosystem Pvt. Ltd.</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/angular.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 -->
 
<!-- Inserting data into client table -->
<?php
ini_set('display_errors',0);
?>


</head>

<body>
<div class="container">
	<div class=" row">
		<div class="col-md-6 requested_o1_form">
			<center><h3>ORDER-1</h3></center>
			<P id="msgo1"></P>
			<form  action="" method="POST" name="order1_form">
			<div class="form-group row">
				<label for="keyfield1" class="col-md-3">Keyfield:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="keyfield1" id="keyfield1" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order1_no" class="col-md-3">Order No:</label>
				<div class="col-md-7" >
					<input  type="number" class="form-control" name="order1_no" id="order1_no" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order1_type" class="col-md-3">Order Type:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="order1_type" id="order1_type" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order1_date" class="col-md-3">Order Date:</label>
				<div class="col-md-7" >
					<input  type="date" class="form-control" name="order1_date" id="order1_date" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order1_client_code" class="col-md-3">Order Client Code:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="order1_client_code" id="order1_client_code" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order1_client_name" class="col-md-3">Order Client Name:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="order1_client_name" id="order1_client_name" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order1_amount" class="col-md-3">Order Amount:</label>
				<div class="col-md-7" >
					<input  type="number" class="form-control" name="order1_amount" id="order1_amount" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order1_flag" class="col-md-3">Order Flag:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="order1_flag" id="order1_flag" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->

			<div class="form-group row ">
				<label for="" class="col-md-3"> </label>
				<div class="col-md-7">
					<input onclick="return noRefresho1()"  type="submit" class="btn btn-success  btn-lg " name="l_save" value="Save">
					<input type="reset" class="btn btn-info  btn-lg " name="l_clear" value="Clear">
				</div>
			</div><!-- form-group -->
		</form>
		</div><!-- requested_o1_form -->

		<div class="col-md-6 requested_o2_form">
			<center><h3>ORDER-2</h3></center>
			<P id="msgo2"></P>
			<form  action="" method="POST" name="order2_form">
			<div class="form-group row">
				<label for="keyfield2" class="col-md-3">Keyfield:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="keyfield2" id="keyfield2" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order2_pos_no" class="col-md-3">Position No:</label>
				<div class="col-md-7" >
					<input  type="number" class="form-control" name="order2_pos_no" id="order2_pos_no" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order2_prod_code" class="col-md-3">Product Code:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="order2_prod_code" id="order2_prod_code" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order2_price" class="col-md-3">Price:</label>
				<div class="col-md-7" >
					<input  type="number" class="form-control" name="order2_price" id="order2_price" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order2_description" class="col-md-3">Description:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="order2_description" id="order2_description" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->
			<div class="form-group row">
				<label for="order2_flag" class="col-md-3">Flag:</label>
				<div class="col-md-7" >
					<input  type="text" class="form-control" name="order2_flag" id="order2_flag" autocomplete="off" required>
				</div>	
			</div><!-- form-group -->

			<div class="form-group row ">
				<label class="col-md-3"> </label>
				<div class="col-md-7">
					<input onclick="return noRefresho2()"  type="submit" class="btn btn-success  btn-lg " name="o2_save" value="Save">
					<input type="reset" class="btn btn-info  btn-lg " name="o2_clear" value="Clear">
				</div>
			</div><!-- form-group -->
		</form>
		</div><!-- requested_o2_form -->
	</div><!-- row -->

	<div class="row">
		<div class="table-responsive  col-md-12 order_tables">
			<table class="table   " >
			<caption>Order-1 Table</caption>
				<tr class="success">
				  <!-- <th></th> -->
				  <th>Keyfield</th>
				  <th>Order No</th>
				  <th>Order Type</th>
				  <th>Order Date</th>
				  <th>Order Client Code</th>
				  <th>Order Client Name</th>
				  <th>Order Amount</th>
				  <th>Order Flag</th>
				</tr>
		  <?php 
				include_once('db_handler.php'); 
				$db = new DBController();
				
				$order1_detail=$db->runQuery("SELECT * FROM order1",null);
				
				if ($order1_detail->rowCount() >0) {
					
			foreach ($order1_detail->fetchAll() as $row_table) {?><tbody>
			  <tr>
		          <!-- <td><input id="select" name="click" type="radio" value="<?php  $row_table['keyfield']; ?>"></td> -->
				  <td><?php echo $row_table['keyfield']; ?></td>
				  <td><?php echo $row_table['order1_no']; ?></td>
				  <td><?php echo $row_table['order1_type']; ?></td>
				  <td><?php echo $row_table['order1_date']; ?></td>
				  <td><?php echo $row_table['order1_client_code']; ?></td>
				  <td><?php echo $row_table['order1_client_name']; ?></td>
				  <td><?php echo $row_table['order1_amount']; ?></td>
				  <td><?php echo $row_table['order1_flag']; ?></td>
			  </tr>
			 <?php }}else{?>
			 	<tr><td><h3><?php echo "No Record Found";} ?></h3></td></tr>
			</table>
		</div><!-- order_tables -->
	</div><!-- row -->

	<div class="row">
		<div class="table-responsive  col-md-12 order_tables">
			<table class="table" >
			<caption>Order-2 Table</caption>
				<tr class="success">
				  <th>Keyfield</th>
				  <th>Position No</th>
				  <th>Product Code</th>
				  <th>Price</th>
				  <th>Description</th>
				  <th>Flag</th>
				</tr>
		  <?php 
				include_once('db_handler.php'); 
				$db = new DBController();
				
				$order2_detail=$db->runQuery("SELECT * FROM order2",null);
				
				if ($order2_detail->rowCount() >0) {
					
			foreach ($order2_detail->fetchAll() as $row_table) {?>
			  <tr>
		          <!-- <td><input name="selector[]" type="checkbox" value="<?php echo $row_table['sl_no']; ?>"></td> -->
				  <td><?php echo $row_table['keyfield']; ?></td>
				  <td><?php echo $row_table['order2_pos_no']; ?></td>
				  <td><?php echo $row_table['order2_prod_code']; ?></td>
				  <td><?php echo $row_table['order2_price']; ?></td>
				  <td><?php echo $row_table['order2_description']; ?></td>
				  <td><?php echo $row_table['order2_flag']; ?></td>
			  </tr>
			 <?php }}else{?>
			 	<tr><td><h3><?php echo "No Record Found";} ?></h3></td></tr>
			</table>
		</div><!-- order_tables -->
	</div><!-- row --><br>
		<div class="col-md-8 col-md-offset-2 row"><button type="button" class="btn btn-success btn-lg ">Approve</button></div>

<br><br><br><br><br>
</div><!-- container -->
<input id="fillname" value=""/>
<script type="text/javascript">
// global var to track the selected row :
var pickedup;
 
$(document).ready(function() {
    $( ".order_tables table tr" ).on( "click", function( event ) {
 
          // get back to where it was before if it was selected :
          if (pickedup != null) {
              pickedup.css( "background-color", "#fff" );
          }
 
          $("#fillname").val($(this).find("td").eq(0).html());
          $( this ).css( "background-color", "#DDF6FC" );
 
          pickedup = $(this);

          document.getElementById("msgo4").innerHTML=pickedup;
          var dataString = 'select='+pickedup;
		$.ajax({
			type:"POST",
			url:"php/test.php",
			data:dataString,
			cache:true,
			success:function(html) {
				$('#msgo3').html(html);	
			}
		});
		return false;
    });
}); 

</script>
 <?php 
        // echo $variable = "<script>document.write(pickedup)</script>"; 
    ?>
<script type="text/javascript">
// javascript code for submit form data without refresh
	function noRefresho1(){
		// alert("hello");
		var keyfield1 = document.getElementById('keyfield1').value;
		var order1_no = document.getElementById('order1_no').value;
		var order1_type = document.getElementById('order1_type').value;var product_ctg_code = document.getElementById('product_ctg_code').value;
		var order1_date = document.getElementById('order1_date').value;
		var order1_client_code = document.getElementById('order1_client_code').value;
		var order1_client_name = document.getElementById('order1_client_name').value;
		var order1_amount = document.getElementById('order1_amount').value;
		var order1_flag = document.getElementById('order1_flag').value;
		var dataString = 'keyfield1='+keyfield1+'&order1_no='+order1_no
						+'&order1_type='+order1_type+'&order1_date='+order1_date
						+'&order1_client_code='+order1_client_code+'&order1_client_name='+order1_client_name
						+'&order1_amount='+order1_amount+'&order1_flag='+order1_flag;
		$.ajax({
			type:"POST",
			url:"php/order1.php",
			data:dataString,
			cache:true,
			success:function(html) {
				$('#msgo1').html(html);	
			}
		});
		return false;
	}

	function noRefresho2(){
		// alert("hello");
		var keyfield2 = document.getElementById('keyfield2').value;
		var order2_pos_no = document.getElementById('order2_pos_no').value;
		var order2_prod_code = document.getElementById('order2_prod_code').value;var product_ctg_code = document.getElementById('product_ctg_code').value;
		var order2_price = document.getElementById('order2_price').value;
		var order2_description = document.getElementById('order2_description').value;
		var order2_flag = document.getElementById('order2_flag').value;

		var dataString = 'keyfield2='+keyfield2+'&order2_pos_no='+order2_pos_no
						+'&order2_prod_code='+order2_prod_code+'&order2_price='+order2_price
						+'&order2_description='+order2_description+'&order2_flag='+order2_flag;
		$.ajax({
			type:"POST",
			url:"php/order2.php",
			data:dataString,
			cache:true,
			success:function(html) {
				$('#msgo2').html(html);	
			}
		});
		return false;
	}
</script>

<P id="msgo3"></P>

</body>
</html>