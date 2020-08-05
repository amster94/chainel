
<?php
//Storing data from CLIENT order1 FORM begin here
ini_set('display_errors',0);
$keyfield1=$_POST['keyfield1'];
$order1_no=$_POST['order1_no'];
$order1_type=$_POST['order1_type'];
$order1_date=$_POST['order1_date'];
$order1_client_code=$_POST['order1_client_code'];
$order1_client_name=$_POST['order1_client_name'];
$order1_amount=$_POST['order1_amount'];
$order1_flag=$_POST['order1_flag'];
// echo $keyfield1;
// if (isset($_POST['l_save'])) {

    $dsn2 ='mysql:host=localhost;dbname=chainel';
    $db2 = new PDO($dsn2,"root","");

    $check_in_table = $db2->prepare("SELECT * FROM order1 WHERE keyfield=:keyfield");
    $check_in_table->bindParam(':keyfield',$keyfield1);
    $check_in_table->execute();
    // echo $order1_update_result->rowCount()."update..";

    $msg="";
    if ($keyfield1=='' OR $order1_no=='' OR $order1_type=='' OR $order1_flag=='' OR $order1_date=='' OR $order1_client_code=='' OR $order1_client_name=='' OR $order1_amount=='') {
        $msg="Fields are required";
    }elseif ($check_in_table->rowCount()>0) {

        foreach ($check_in_table->fetchAll() as $key) {
            $msg="This keyfield Exist in Order No: ".$key['order1_no'];
        }
        
    }else{
        $result_for_order1=$db2->prepare("INSERT INTO order1(keyfield,order1_no,order1_type,order1_date,order1_client_code,order1_client_name,order1_amount,order1_flag)
            VALUES(:keyfield,:order1_no,:order1_type,:order1_date,:order1_client_code,:order1_client_name,:order1_amount,:order1_flag)");

        $result_for_order1->bindParam(':keyfield', $keyfield1);
        $result_for_order1->bindParam(':order1_no', $order1_no);
        $result_for_order1->bindParam(':order1_type', $order1_type);
        $result_for_order1->bindParam(':order1_date', $order1_date);
        $result_for_order1->bindParam(':order1_client_code', $order1_client_code);
        $result_for_order1->bindParam(':order1_client_name', $order1_client_name);
        $result_for_order1->bindParam(':order1_amount', $order1_amount);
        $result_for_order1->bindParam(':order1_flag', $order1_flag);
        $result_for_order1->execute();
        $result_for_order1->rowCount();
        if ($result_for_order1->rowCount()>0) {

            $msg="Data Saved...";
            // echo '<div class="alert alert-success">'.$msg.'</div>';
        }else{$msg="Something error..";}
    }
 
echo '<div class="alert alert-success">'.$msg.'</div>';


// }


?>