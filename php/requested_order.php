<?php 
// session_start();
ini_set('display_errors',0);
$data = $_POST['selectrow1'];
// $_SESSION['select']=$data ;
$flag=2;
$msg="";
if ($data=='') {
	$msg="Select the row for Update.";
}else{

	require_once ('connect_pdo.php');
	
    $update_order1_flag=$db->prepare("UPDATE order1 SET order1_flag=:flag WHERE keyfield=:keyfield");
	$update_order1_flag->bindParam(':flag',$flag);
	$update_order1_flag->bindParam(':keyfield',$data);
	$update_order1_flag->execute();
	if ($update_order1_flag->rowCount()>0) {
		  $msg="Approved...";;
	}else{ $msg="Approved order or Something Error!";}
}
echo '<p class="alert alert-success">'.$msg.'</p>';

?>
