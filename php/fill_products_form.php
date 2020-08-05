<?php 
ini_set('display_errors',0);
$product_code=$_POST['product_code'];

// if (isset($_POST['l_save'])) {

    require_once ('connect_pdo.php');

    $result = $db->prepare("SELECT * FROM products WHERE prod_code=:p_code");
    $result->bindParam(':p_code',$product_code);
    $result->execute();
     $data = array();
    if ($result->rowCount()>0) {
        foreach ($result as $row) {
        $row_data = array(
          'product_code' => $row['prod_code'],
          'product_description' => $row['prod_descr'], 
          'product_price' => $row['prod_price'],
          'product_ctg_code' => $row['prod_ctg_code'],
          'product_flag' => $row['flag']
        );
      array_push($data, $row_data);
     }

   // Print from json data to array in table
 echo $data= json_encode($data);
   // echo $data->keyfield;
   // echo $selected;
 
}
?>