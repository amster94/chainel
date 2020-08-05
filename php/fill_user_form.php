<?php 
ini_set('display_errors',0);
$user_code=$_POST['user_code'];
// $name=$_POST['name'];
// echo $user_code;
// if (isset($_POST['l_save'])) {

  require_once ('connect_pdo.php');

    $result = $db->prepare("SELECT * FROM new_user WHERE user_code=:u_code");
    $result->bindParam(':u_code',$user_code);
    $result->execute();
     $data = array();
    if ($result->rowCount()>0) {
        // echo $result->rowCount();
        foreach ($result as $row) {
      $row_data = array(
        'user_name' => $row['user_name'],
        'user_code' => $row['user_code'], 
        'client_code_user' => $row['client_code'], 
        'password' => $row['user_password'],
        'is_admin' => $row['is_admin'],
        'user_contact' => $row['user_contact'],
        'email_address' => $row['user_email']
      );
      array_push($data, $row_data);
     }

   // Print from json data to array in table
 echo json_encode($data);
   // echo $data->keyfield;
   // echo $selected;
 
}
?>