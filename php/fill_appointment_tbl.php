<?php 
ini_set('display_errors',0);
// if (isset($_POST['l_save'])) {
require_once ('connect_pdo.php'); 
    $sql_all="SELECT * FROM appointment";
    $result = $db->prepare($sql_all);    
    $result->execute();
    $data = array();
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
        'user_code' => $row['user_code'], 
        'remarks' => $row['remarks'],
        'kind_of_visit' => $row['kind_of_visit'],
        'requested_employee' => $name,
        'attendent' => $row['attendent'],
        'id' => $row['id'],
        'login_info' => $row['login_info']
      );
      array_push($data, $row_data);
     }
}
echo json_encode($data);
?>