<?php 
// if (isset($_POST['l_update'])) {
ini_set('display_errors',0);

$form_id=$_POST['form_id'];
require_once ('connect_pdo.php');
$msg="";
$updated="Updated...";
$empty_filds="Fields are required...";
$if_no_change="Change something for update..";
switch ($form_id) {
// ************************************
// code for admin master menu start here
// *************************************
  case '#client_form':
      // $client_code= $_POST['client_code'];
      $client_code= $_POST['code'];
      $name= $_POST['name'];
      $location= $_POST['location'];
      $address= $_POST['address'];
      $tel= $_POST['tel'];
      $ref_name1= $_POST['ref_name1'];
      $ref_name2= $_POST['ref_name2'];
      $ref_name3= $_POST['ref_name3'];
      $ref_name4= $_POST['ref_name4'];
      $email1= $_POST['email1'];
      $email2= $_POST['email2'];
      $email3= $_POST['email3'];
      $email4= $_POST['email4'];

      if ($client_code=='' OR $name=='' OR $location=='Not Selected' OR $address=='' OR $tel=='' OR $ref_name1=='' OR $email1=='') {
      $msg=$empty_filds;
      }else{

        $update_client_table=$db->prepare("UPDATE bclient SET 
                           name=:nm, location=:loc, address=:add, tel=:tele, 
                           ref_name1=:ref_one,ref_name2=:ref_two, ref_name3=:ref_three,
                           ref_name4=:ref_four, email1=:em_one, email2=:em_two,
                           email3=:em_three, email4=:em_four  WHERE client_code=:c_cod");
        
          $update_client_table->bindParam(':nm', $name);
          $update_client_table->bindParam(':loc', $location);
          $update_client_table->bindParam(':add', $address);
          $update_client_table->bindParam(':tele', $tel);
          $update_client_table->bindParam(':ref_one', $ref_name1);
          $update_client_table->bindParam(':ref_two', $ref_name2);
          $update_client_table->bindParam(':ref_three', $ref_name3);
          $update_client_table->bindParam(':ref_four', $ref_name4);
          $update_client_table->bindParam(':em_one', $email1);
          $update_client_table->bindParam(':em_two', $email2);
          $update_client_table->bindParam(':em_three', $email3);
          $update_client_table->bindParam(':em_four', $email4);

        $update_client_table->bindParam(':c_cod',$client_code);
        $update_client_table->execute();
        if ($update_client_table->rowCount()>0) {
           
            // $msg="<div class='alert alert-success'>
            //     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            //     <strong>Save Successfully...</strong></div>";
            $msg=$updated;
        }else{ $msg=$if_no_change;}
      }
    break;

  case '#location_form':
  // echo "update page";
        // $location_code = $_POST['location_code'];
        $location_code = $_POST['code'];
        $location_name=$_POST['location_name'];
        
        if ($location_code=='' OR $location_name=='') {
          $msg=$empty_filds;
        }else{
          $update_location_table=$db->prepare("UPDATE location SET location_name=:ln_key WHERE location_code=:lc");
          $update_location_table->bindParam(':ln_key',$location_name);
          $update_location_table->bindParam(':lc',$location_code);
          $update_location_table->execute();
          if ($update_location_table->rowCount()>0) {
            $msg=$updated;
          }else{ $msg=$if_no_change;}
            }
    break;
  
  case '#user_frm':
        $user_name =$_POST['user_name'];
        // $user_code =$_POST['user_code'];
        $user_code =$_POST['code'];
        $password =$_POST['password'];
        $is_admin =$_POST['is_admin'];
        $user_contact =$_POST['user_contact'];
        $email_address =$_POST['email_address'];
        // echo $user_code;
        if ($user_code=='' OR $user_name=='' OR $password=='' OR $user_contact=='' OR $email_address=='') {
        $msg=$empty_filds;
        }else{
        $update_users_table=$db->prepare("UPDATE users SET user_name=:user_nm, 
                          password=:pwd, is_admins=:is_adm, user_contact=:user_cont,
                          email_address=:email_add WHERE user_code=:u_cd");

            $update_users_table->bindParam(':user_nm', $user_name);
            $update_users_table->bindParam(':pwd', $password);
            $update_users_table->bindParam(':is_adm', $is_admin);
            $update_users_table->bindParam(':user_cont', $user_contact);
            $update_users_table->bindParam(':email_add', $email_address);
            $update_users_table->bindParam(':u_cd', $user_code);

        $update_users_table->execute();
        if ($update_users_table->rowCount()>0) {
          $msg=$updated;
        }else{ $msg=$if_no_change;}
        }
    break;

  case '#products_form':
      // $product_code=$_POST['product_code'];
      $product_code=$_POST['code'];
      $product_description=$_POST['product_description'];
      $product_price=$_POST['product_price'];
      $product_ctg_code=$_POST['product_ctg_code'];
      $product_flag=$_POST['product_flag'];

      if ($product_code=='' OR $product_price=='' OR $product_ctg_code=='Not Selected' OR $product_flag=='') {
        $msg=$empty_filds;
      }else{

        $update_products_table=$db->prepare("UPDATE products SET prod_descr=:prod_descr, 
           prod_price=:prod_price, prod_ctg_code=:prod_ctg, flag=:prod_flag WHERE prod_code=:prod_code");
        
              $update_products_table->bindParam(':prod_descr', $product_description);
              $update_products_table->bindParam(':prod_price', $product_price);
              $update_products_table->bindParam(':prod_ctg', $product_ctg_code);
              $update_products_table->bindParam(':prod_flag', $product_flag);
              $update_products_table->bindParam(':prod_code', $product_code);

          $update_products_table->execute();
          if ($update_products_table->rowCount()>0) {
              $msg=$updated;
          }else{ $msg=$if_no_change;}
      }
    break;

  case '#product_ctg':
          // $products_ctg_code = $_POST['products_ctg_code'];
          $products_ctg_code = $_POST['code'];
          $product_ctg_title=$_POST['products_ctg_title'];
          $msg="";
          if ($products_ctg_code=='' OR $product_ctg_title=='') {
            $msg=$empty_filds;
          }else{
            $update_product_ctg_table=$db->prepare("UPDATE product_category SET prod_ctg_title=:pctt_key WHERE prod_ctg_code=:pctc");
            $update_product_ctg_table->bindParam(':pctt_key',$product_ctg_title);
            $update_product_ctg_table->bindParam(':pctc',$products_ctg_code);
            $update_product_ctg_table->execute();
            if ($update_product_ctg_table->rowCount()>0) {
              $msg=$updated;
            }else{ $msg=$if_no_change;}
          }
      break;

// ************************************
// code for user master menu start here
// *************************************
  case '#user_profile_form':
      // $client_code= $_POST['client_code'];
      $client_code= $_POST['code'];
      $name= $_POST['name'];
      $location= $_POST['location'];
      $address= $_POST['address'];
      $tel= $_POST['tel'];
      $ref_name1= $_POST['ref_name1'];
      $ref_name2= $_POST['ref_name2'];
      $ref_name3= $_POST['ref_name3'];
      $ref_name4= $_POST['ref_name4'];
      $email1= $_POST['email1'];
      $email2= $_POST['email2'];
      $email3= $_POST['email3'];
      $email4= $_POST['email4'];

      if ($client_code=='' OR $name=='' OR $location=='Not Selected' OR $address=='' OR $tel=='' OR $ref_name1=='' OR $email1=='') {
      $msg=$empty_filds;
      }else{

        $update_client_table=$db->prepare("UPDATE clients_register SET 
                           name=:nm, location=:loc, address=:add, tel=:tele, 
                           ref_name1=:ref_one,ref_name2=:ref_two, ref_name3=:ref_three,
                           ref_name4=:ref_four, email1=:em_one, email2=:em_two,
                           email3=:em_three, email4=:em_four  WHERE client_code=:c_cod");
        
          $update_client_table->bindParam(':nm', $name);
          $update_client_table->bindParam(':loc', $location);
          $update_client_table->bindParam(':add', $address);
          $update_client_table->bindParam(':tele', $tel);
          $update_client_table->bindParam(':ref_one', $ref_name1);
          $update_client_table->bindParam(':ref_two', $ref_name2);
          $update_client_table->bindParam(':ref_three', $ref_name3);
          $update_client_table->bindParam(':ref_four', $ref_name4);
          $update_client_table->bindParam(':em_one', $email1);
          $update_client_table->bindParam(':em_two', $email2);
          $update_client_table->bindParam(':em_three', $email3);
          $update_client_table->bindParam(':em_four', $email4);

        $update_client_table->bindParam(':c_cod',$client_code);
        $update_client_table->execute();
        if ($update_client_table->rowCount()>0) {
           
            // $msg="<div class='alert alert-success'>
            //     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            //     <strong>Save Successfully...</strong></div>";
            $msg=$updated;
        }else{ $msg=$if_no_change;}
      }
    break;

  case '#change_password_form':
    session_start();
    $user_code=$_SESSION['user_id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
      
    if ($current_password=='' OR $new_password=='' OR $confirm_password=='') {
    $msg= "Fields are required...";
    }else{
        $result = $db->prepare("SELECT * FROM users WHERE user_code=:user_code AND password=:pwd");
        $result->bindParam(":user_code",$user_code);
        $result->bindParam(":pwd",$current_password);
        $result->execute();
        $row=$result->rowcount();


      if ($row==1) {

          if ($new_password==$confirm_password) {
        $update_pwd= $db->prepare("UPDATE users set password='$new_password' WHERE user_code='$user_code'");
        $update_pwd->execute();
        
          $msg= "Password change succefully...";
          }else{
          // echo "Password mismatch...";
          $msg= "Password Mismatch...";
          }

      }else{ $msg= "Current Password is wrong...";}
    }
    break;
  default:
    # code...
    break;
}

  
// echo '<p class="alert alert-success">'.$msg.'</p>';
echo $msg;

// }
?>