<?php 
// data in textfields of location form after selecting table row from list 

ini_set('display_errors',0);
$news_id=$_POST['news_id'];
// $news_title=$_POST['news_title'];
// $location_name=$_POST['location_name'];
// echo $news_id;
// if (isset($_POST['l_save'])) {

    require_once ('../../php/connect_pdo.php');

    $result = $db->prepare("SELECT * FROM news WHERE news_id=:news_id");
    $result->bindParam(':news_id',$news_id);
    $result->execute();
     $data = array();
    if ($result->rowCount()>0) {
        // echo $result->rowCount();
        foreach ($result as $row) {
      $row_data = array(
        'news_id' => $row['news_id'], 
        'news_title' => $row['news']
      );
      array_push($data, $row_data);
     }

   // Print from json data to array in table
 echo $data= json_encode($data);
   // echo $data->keyfield;
   // echo $selected;
 
}
?>