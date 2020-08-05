<?php 
ini_set('display_errors',0);
session_start();
// if (isset($_POST['l_save'])) {
$data = array();
require_once ('connect_pdo.php'); 
$attend_status=$_POST['status'];
  // if ($attend_status='All') {
  //   $sql="SELECT * FROM appointment WHERE user_code=:user_code";
  //   $attend_status='';
   
  // }else{
  //   $sql="SELECT * FROM appointment WHERE user_code=:user_code AND attendent=:attended";
    
  // }       
  $sql="SELECT * FROM appointment WHERE user_code=:user_code AND attendent=:attended";
  $result = $db->prepare($sql); 
  $result->bindParam(':user_code', $_SESSION['user_id']);
  $result->bindParam(':attended', $attend_status); 
  $result->execute();
  if ($result->rowCount()>0) {
      foreach ($result as $row) {
        $result1=$db->prepare("SELECT * FROM request_emp WHERE email=:email"); 
        $result1->bindParam(':email', $row['requested_employee']);
        $result1->execute();
        foreach ($result1->fetchAll() as $row1){
          $name=$row1['name'];
        }
      $row_data = array(
        'appointment_date' => $row['appointment_date'], 
        'remarks' => $row['remarks'],
        'kind_of_visit' => $row['kind_of_visit'],
        'requested_employee' => $name,
        'attendent' => $row['attendent'],
        'id' => $row['id']
      );
    array_push($data, $row_data);
   }
  }
echo json_encode($data);
?>