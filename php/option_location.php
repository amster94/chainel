<?php
// $selected = $_POST['selectrow1'];
include_once('db_handler.php'); 
$db = new DBController();
$show_location_code=$db->runQuery("SELECT * FROM location",null);	
 $data = array();

 foreach ($show_location_code as $row) {
  $row_data = array(
	'location_code' => $row['location_code'],
	'location_name' => $row['location_name']

   );
  array_push($data, $row_data);
 }
 
 echo json_encode($data);
 // echo $selected;
?>