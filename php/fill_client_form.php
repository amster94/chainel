<?php 
// ini_set('display_errors',0);
$client_code=$_POST['client_code'];
// $client_code=$_SESSION['user_id'];
// $name=$_POST['name'];
 // echo $client_code;
// if (isset($_POST['l_save'])) {

    require_once ('connect_pdo.php');

    $result = $db->prepare("SELECT * FROM bclient WHERE client_code=:c_code");
    $result->bindParam(':c_code',$client_code);
    $result->execute();
     $data = array();
    if ($result->rowCount()>0) {
         // echo $result->rowCount();
        foreach ($result as $row) {
      $row_data = array(
        'client_code' => $row['client_code'], 
        'name' => $row['name'],
        'location1' => $row['location'],
        'address' => $row['address'],
        'tel' => $row['tel'],
        'user_email' => $row['user_email'],
        'ref_name1' => $row['ref_name1'],
        'ref_name2' => $row['ref_name2'],
        'ref_name3' => $row['ref_name3'],
        'ref_name4' => $row['ref_name4'],
        'email1' => $row['email1'],
        'email2' => $row['email2'],
        'email3' => $row['email3'],
        'email4' => $row['email4']
      );
      array_push($data, $row_data);
     }

   // Print from json data to array in table
 echo $data= json_encode($data);
   // echo $data->keyfield;
   // echo $selected;
 
}
?>