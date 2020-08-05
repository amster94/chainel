
<?php
//Storing data from CLIENT order1 FORM begin here
ini_set('display_errors',0);
$keyfield2=$_POST['keyfield2'];
$order2_pos_no=$_POST['order2_pos_no'];
$order2_prod_code=$_POST['order2_prod_code'];
$order2_price=$_POST['order2_price'];
$order2_description=$_POST['order2_description'];
$order2_flag=$_POST['order2_flag'];
// echo $keyfield2;
// if (isset($_POST['l_save'])) {

    $dsn2 ='mysql:host=localhost;dbname=chainel';
    $db2 = new PDO($dsn2,"root","");

    $check_in_table = $db2->prepare("SELECT * FROM order2 WHERE keyfield=:keyfield");
    $check_in_table->bindParam(':keyfield',$keyfield2);
    $check_in_table->execute();
    // echo $order1_update_result->rowCount()."update..";

    $msg="";
    if ($keyfield2=='' OR $order2_pos_no=='' OR $order2_prod_code=='' OR $order2_price=='' OR $order2_description=='' OR $order2_flag=='') {
        $msg="Fields are required";
    }elseif ($check_in_table->rowCount()>0) {

        foreach ($check_in_table->fetchAll() as $key) {
            $msg="This keyfield Exist in Product Code: ".$key['order2_prod_code'];
        }
        
    }else{
        $result_for_order2=$db2->prepare("INSERT INTO order2(keyfield,order2_pos_no,order2_prod_code,order2_price,order2_description,order2_flag)
            VALUES(:keyfield,:order2_pos_no,:order2_prod_code,:order2_price,:order2_description,:order2_flag)");

        $result_for_order2->bindParam(':keyfield', $keyfield2);
        $result_for_order2->bindParam(':order2_pos_no', $order2_pos_no);
        $result_for_order2->bindParam(':order2_prod_code', $order2_prod_code);
        $result_for_order2->bindParam(':order2_price', $order2_price);
        $result_for_order2->bindParam(':order2_description', $order2_description);
        $result_for_order2->bindParam(':order2_flag', $order2_flag);
        $result_for_order2->execute();
        $result_for_order2->rowCount();
        if ($result_for_order2->rowCount()>0) {

            $msg="Data Saved...";
            // echo '<div class="alert alert-success">'.$msg.'</div>';
        }else{$msg="Something error..";}
    }
 
echo '<div class="alert alert-success">'.$msg.'</div>';


// }


?>