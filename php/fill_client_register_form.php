<?php 
// ini_set('display_errors',0);
$client_code=$_POST['client_code'];
$client_code_user=$_POST['client_code_user'];
// $client_code=$_SESSION['user_id'];
// $name=$_POST['name'];
 // echo $client_code;
// if (isset($_POST['l_save'])) {

  require_once ('connect_pdo.php');
  $check_in_user_table=$db->prepare("SELECT * FROM bclient WHERE client_code=:cc_user ");
  $check_in_user_table->bindParam(':cc_user',$client_code_user);
  $check_in_user_table->execute();

  if ($check_in_user_table->rowCount()>0) {
      $result = $db->prepare("SELECT * FROM new_user WHERE user_code=:c_code OR user_email=:c_email");
      $result->bindParam(':c_code',$client_code);
      $result->bindParam(':c_email',$client_code);
      $result->execute();
      $data = array();
      if ($result->rowCount()>0) {
           // echo $result->rowCount();
          foreach ($result as $row) {
          $row_data = array(
          'client_code' => $row['user_code'], 
          'name' => $row['user_name'],
          'location' => $row['user_location'],
          'address' => $row['user_address'],
          'tel' => $row['user_contact'],
          'user_email' => $row['user_email'],
          'ref_name1' => $row['user_ref_name'],
          'ref_name2' => $row['user_ref_name2'],
          'ref_name3' => $row['user_ref_name3'],
          'ref_name4' => $row['user_ref_name4'],
          'email1' => $row['user_ref_email'],
          'email2' => $row['user_ref_email2'],
          'email3' => $row['user_ref_email3'],
          'email4' => $row['user_ref_email4']
          );
          array_push($data, $row_data);
        }

       // Print from json data to array in table
       echo $data= json_encode($data);
         // echo $data->keyfield;
         // echo $selected;
       
    }
 }else{echo '<script type="text/javascript">alert("Not a register user.")</script>';}


    
?>