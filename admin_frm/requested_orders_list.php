<!DOCTYPE html>
<html>
<head>
<?php
ini_set('display_errors',0);
?>

</head>
<body>
<div class="container">
<!-- Order Table-1 -->
	<div class="row"><br>
	<div id="msgo3"></div>
		<div class="table-responsive  col-md-12 order_tables">
			<table class="table   " >
			<caption><?php echo $lang['order_1_table']; ?></caption>
				<tr class="success">
				  <!-- <th></th> -->
				  <th><?php echo $lang['keyfield']; ?></th>
				  <th><?php echo $lang['order_no']; ?></th>
				  <th><?php echo $lang['order_type']; ?></th>
				  <th><?php echo $lang['order_date']; ?></th>
				  <th><?php echo $lang['client_code']; ?></th>
				  <th><?php echo $lang['client_name']; ?></th>
				  <th><?php echo $lang['order_amount']; ?></th>
				  <th><?php echo $lang['order_flag']; ?></th>
				</tr>
			 	<tbody>
			 	<?php 
					include_once('php/connect_pdo.php'); 
					// $flag=1;
					$result=$db->prepare("SELECT * FROM order1 WHERE order1_flag='1'");
					$result->execute();
					if ($result->rowCount() >0) {
						
					foreach ($result->fetchAll() as $row_table){?>
				
				  <tr>
				  	  <!-- <td><a href="master.php?select=<?php echo $row_table["keyfield"]; ?>"><?php echo $row_table["keyfield"]; ?></a></td> -->
				  	  <td onclick="return Reflect()" id="<?php echo $row_table['keyfield']; ?>"><?php echo $row_table["keyfield"]; ?></td>
				  	  <td><?php echo $row_table['order1_no']; ?></td>
					  <td><?php echo $row_table['order1_type']; ?></td>
					  <td><?php echo $row_table['order1_date']; ?></td>
					  <td><?php echo $row_table['order1_client_code']; ?></td>
					  <td><?php echo $row_table['order1_client_name']; ?></td>
					  <td><?php echo $row_table['order1_amount']; ?></td>
					  <td><?php echo $row_table['order1_flag']; ?></td>
				  </tr>
				  
				 <?php }}?>
				</tbody>
				<!-- <tbody id="tablebody1"></tbody>  -->
			</table>
		</div><!-- order_tables -->
	</div><!-- row -->

<!-- Order table-2 -->
<div class="row">
		<div class="table-responsive col-md-12 order_tables">
			<table class="table" >
			<caption><?php echo $lang['order_2_table']; ?></caption>
				<tr class="success">
				  <th><?php echo $lang['keyfield']; ?></th>
				  <th><?php echo $lang['position_no']; ?></th>
				  <th><?php echo $lang['product_code'] ?></th>
				  <th><?php echo $lang['price']; ?></th>
				  <th><?php echo $lang['description']; ?></th>
				  <th><?php echo $lang['flag']; ?></th>
				</tr>
				<tbody id="tablebody">
					
				</tbody>
			</table>
		</div><!-- order_tables -->
	</div><!-- row --><br>
	<div class="col-md-8 col-md-offset-2 row"><button onclick="return Approve()" type="button" class="btn btn-success btn-lg custom_btn"><?php echo $lang['approve']; ?></button></div>

</div><!-- container -->

<!-- <input id="fillname" value=""/> -->
<p id="msgo3s"></p>

<script type="text/javascript" src="js/custom-js.js"></script>
</body>
</html>