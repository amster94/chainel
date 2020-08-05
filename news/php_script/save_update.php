<?php 

$news_id=$_POST['news_id'];
$news=$_POST['news'];
$msg="";
 $empty_fields="Fields are required";
 $saved="Data Saved...";
 $fail="Error!";
 $updated="Updated...";
$empty_filds="Fields are required...";
$if_no_change="This news allready exist in database. Change something for update..";
$flag='INSERT';
require_once('../../php/connect_pdo.php');
if ($news !='') {

$check_in_table = $db->prepare("SELECT * FROM news WHERE news=:news");
// $check_in_table->bindParam(':news_id',$news_id);
$check_in_table->bindParam(':news',$news);
$check_in_table->execute();
// echo $news_update_result->rowCount()."update..";


    if ($check_in_table->rowCount()>0) {
        $flag='UPDATING';
          $update_news_table=$db->prepare("UPDATE news SET news=:news WHERE news_id=:news_id");
          $update_news_table->bindParam(':news',$news);
          $update_news_table->bindParam(':news_id',$news_id);
          $update_news_table->execute();
          if ($update_news_table->rowCount()>0) {
            $msg= $updated;
            $flag='INSERT'; 
            
          }else{ $msg=$if_no_change;}
            foreach ($check_in_table->fetchAll() as $key) {
                $msg1="This Code Already Exist in ".$key['news'];
            }

    }elseif($flag=='INSERT' AND $check_in_table->rowCount()==0){
        $result_for_news=$db->prepare("INSERT INTO news(news_id,news)
            VALUES(:news_id,:news)");

        $result_for_news->bindParam(':news_id', $news_id);
        $result_for_news->bindParam(':news', $news);
        $result_for_news->execute();
        if ($result_for_news->rowCount()>0) {
            $flag='UPDATING';
            $msg=$saved;
            // echo '<div class="alert alert-success">'.$msg.'</div>';
        }else{$msg=$fail;}
        
    }else{$msg="Do nothing";}
}else{$msg=$empty_fields;}   
echo $msg;  
?>