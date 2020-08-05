<?php
$selected = $_POST['selectrow1'];
 include_once('db_handler.php'); 
$db = new DBController();
// $selected=1;
$result=$db->runQuery("SELECT * FROM order2  WHERE keyfield=:condition",$selected);
echo $result->rowCount();
 $data = array();
 foreach ($result as $row) {
  // $row_data = array(
   // 'keyfield' => $row['keyfield'], 
   // 'order2_pos_no' => $row['order2_pos_no'],
   //  'order2_prod_code' => $row['order2_prod_code'],
   //  'order2_price' => $row['order2_price'],
    
   //  'order2_description' => $row['order2_description'],
   //  'order2_flag' => $row['order2_flag']
 	// );
     	echo "<tr>";
        echo "<td>" . $row['keyfield'] . "</td>";
        echo "<td>" . $row['order2_pos_no'] . "</td>";
        echo "<td>" . $row['order2_prod_code'] . "</td>";
        echo "<td>" . $row['order2_price'] . "</td>";
        echo "<td>" . $row['order2_description'] . "</td>";
        echo "<td>" . $row['order2_flag'] . "</td>";
        echo "</tr>";

  
  // array_push($data, $row_data);
 }
 
 // $data= json_encode($data);
 // echo $data->keyfield;
 // echo $selected;


 
?>