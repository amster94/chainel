<?php 
ini_set('display_errors',0);
$products_ctg_code=$_POST['products_ctg_code'];
// $name=$_POST['name'];
// echo $products_ctg_code;
// if (isset($_POST['l_save'])) {

    require_once ('connect_pdo.php');

    $result = $db->prepare("SELECT * FROM product_category WHERE prod_ctg_code=:p_ctg_code");
    $result->bindParam(':p_ctg_code',$products_ctg_code);
    $result->execute();
     $data = array();
    if ($result->rowCount()>0) {
        // echo $result->rowCount();
        foreach ($result as $row) {
      $row_data = array(
        'products_ctg_code' => $row['prod_ctg_code'], 
        'products_ctg_title' => $row['prod_ctg_title'],
      );
      array_push($data, $row_data);
     }

   // Print from json data to array in table
 echo $data= json_encode($data);
   // echo $data->keyfield;
   // echo $selected;
 
}
?>