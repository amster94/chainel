<?php 
$news_id=$_POST['news_id'];
$msg="";
require_once('../../php/connect_pdo.php');
if ($news_id=='XX') {
	$msg="Select message from news list!";
}else{
	$result = $db->prepare("DELETE FROM news WHERE news_id=:news_id");
	$result->bindParam(':news_id',$news_id);
	$result->execute();
	if ($result->rowCount()>0) {
		$msg="News deleted success...!";
	}else{$msg="Something err!";}
}
echo $msg;

?>