<?php
// $selected = $_POST['selectrow1'];
 include_once('db_handler.php'); 
$db = new DBController();
// $selected=123;
$Flag=2;
$approved_list=$db->runQuery("SELECT * FROM order1 , order2 WHERE order1.keyfield=order2.keyfield AND order1.order1_flag=:condition",$Flag);
				
 $data = array();
 foreach ($approved_list as $row) {
  $row_data = array(
	'keyfield' => $row['keyfield'], 
	'order1_no' => $row['order1_no'],
	'order1_type' => $row['order1_type'],
	'order1_date' => $row['order1_date'],
	'order1_client_code' => $row['order1_client_code'],
	'order1_client_name' => $row['order1_client_name'],
	'order1_amount' => $row['order1_amount'],
	'order1_flag' => $row['order1_flag'],

	'order2_pos_no' => $row['order2_pos_no'],
	'order2_prod_code' => $row['order2_prod_code'],
	'order2_price' => $row['order2_price'],
	'order2_description' => $row['order2_description'],
	'order2_flag' => $row['order2_flag']

   );
  array_push($data, $row_data);
 }
 
 echo json_encode($data);
 // echo $selected;
?>