<?php
// $selected = $_POST['selectrow1'];
include_once('db_handler.php'); 
$db = new DBController();
$show_product_ctg_code=$db->runQuery("SELECT * FROM product_category",null);	
 $data = array();

 foreach ($show_product_ctg_code as $row) {
  $row_data = array(
	'product_ctg_code' => $row['prod_ctg_code'],
	'product_ctg_title' => $row['prod_ctg_title']

   );
  array_push($data, $row_data);
 }
 
 echo json_encode($data);
 // echo $selected;
?>