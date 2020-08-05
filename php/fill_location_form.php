<?php 
// data in textfields of location form after selecting table row from list 

ini_set('display_errors',0);
$location_code=$_POST['location_code'];
// $location_name=$_POST['location_name'];
// echo $location_code;
// if (isset($_POST['l_save'])) {

    require_once ('connect_pdo.php');

    $result = $db->prepare("SELECT * FROM location WHERE location_code=:lcode");
    $result->bindParam(':lcode',$location_code);
    $result->execute();
     $data = array();
    if ($result->rowCount()>0) {
        // echo $result->rowCount();
        foreach ($result as $row) {
      $row_data = array(
        'location_codeCHID' => $row['location_code'], 
        'location_name' => $row['location_name']
      );
      array_push($data, $row_data);
     }

   // Print from json data to array in table
 echo json_encode($data);
 
}

?>