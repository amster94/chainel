<?php
// $selected = $_POST['selectrow1'];
 include_once('db_handler.php'); 
$db = new DBController();
// $selected=123;
$Flag=0;
$approved_list=$db->runQuery("SELECT * FROM new_user WHERE flag=:condition",$Flag);
				
 $data = array();
 foreach ($approved_list as $row) {
  $row_data = array(
	'user_code' => $row['user_code'], 
	'user_name' => $row['user_name'],
	'user_location' => $row['user_location'],
	'user_address' => $row['user_address'],
	'user_contact' => $row['user_contact'],
	'user_email' => $row['user_email'],
	'user_ref_name' => $row['user_ref_name'],
	'user_ref_email' => $row['user_ref_email']

   );
  array_push($data, $row_data);
 }
 echo json_encode($data); 
?>