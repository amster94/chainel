<?PHP
error_reporting(-1);
// ini_set('display_errors', 'On');
ini_set('display_errors',0);
include('connect_pdo.php');
$remarks=$_POST['remarks'];
$order_no=$_POST['order_no'];
// $gross_total=$_POST['gross_total'];
// echo $_POST['order_no'];
// print_r($_POST['json_obj']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $tableArray = isset($_REQUEST['tableArray']) ? $_REQUEST['tableArray'] : "";
$tableArray=$_POST['tableArray'];
$tableArray=json_decode($tableArray,JSON_PRETTY_PRINT);
session_start();
$user_name= $_SESSION['user_name'];
$user_id= $_SESSION['user_id'];
$gross_total=0;
foreach($tableArray as $row){
   $gross_total=$gross_total+$row['amount']; 
}
if ($gross_total !=0) {
    // saving data into table order1
    
    $result=$db->prepare("SELECT MAX(keyfield) as keyfield FROM order1");
        $result->execute();
        foreach ($result->fetchAll() as $row) {
           $keyfield= $row['keyfield']+1;
    }
    $sql = "INSERT INTO order1 (keyfield, order1_no, order1_date, order1_client_code, order1_client_name, order1_amount, remarks) 
                    VALUES (:keyfield,:order1_no, :order1_date, :order1_client_code, :order1_client_name, :order1_amount, :remarks)";
    $result = $db->prepare($sql);

        $result->bindValue(':keyfield', $keyfield); 
        $result->bindValue(':order1_no', $order_no); 
        $result->bindValue(':order1_date', date('Y-m-d'));   
        $result->bindValue(':order1_client_code', $user_id);   
        $result->bindValue(':order1_client_name', $user_name);   
        $result->bindValue(':order1_amount', $gross_total);  
        $result->bindValue(':remarks', $remarks);  
        $result->execute();

    // saving data into table order2
    $sql = "INSERT INTO order2 (keyfield, order2_pos_no, order2_prod_code, order2_description, qty, order2_price, amount) VALUES (:keyfield,:order2_pos_no, :order2_prod_code, :order2_description, :qty, :order2_price, :amount)";
    $sth = $db->prepare($sql);
    $gross_total=0;
    foreach($tableArray as $row){
        $sth->bindValue(':keyfield', $keyfield); 
        $sth->bindValue(':order2_pos_no', $row['sl_no']); 
        $sth->bindValue(':order2_prod_code', $row['product_code']);   
        $sth->bindValue(':order2_description', $row['product_name']);   
        $sth->bindValue(':qty', $row['qty']);   
        $sth->bindValue(':order2_price', $row['price']);   
        $sth->bindValue(':amount', $row['amount']);   
        $sth->execute();
        // $gross_total=$gross_total+$row['amount'];
    }

    echo "Thanks for choosing our products!";   
}else{echo "Please Select Product!";}

// $remarks=$_POST['remarks'];
// $result=$db->prepare("UPDATE order1 SET remarks=:remarks WHERE order1_client_code=:order1_client_code");
// $result->bindParam(":order1_client_code",$user_id);
// $result->bindParam(":remarks",$remarks);
// $result->execute();
// echo $gross_total;
// print_r($tableArray);
?>