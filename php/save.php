<?php
//Storing data 
ini_set('display_errors',0);
$form_id=$_POST['form_id'];
// echo $form_id;
include 'email_veryfication.php';
require_once ('connect_pdo.php'); 
 $msg="";
 $empty_fields="Fields are required";
 $saved="Data Saved...";
 $fail="Error!";
 $updated="Updated...";
$empty_filds="Fields are required...";
$if_no_change="Change something for update..";
$invalid_email="Invalid email or not exist!";
$flag='INSERT';  //flag=0 for save and flag=1 for update database.
switch ($form_id) {
    case '#client_form':
        $client_code= $_POST['client_code'];
        // $client_code= $_POST['code1'];
        $name= $_POST['name'];
        $location= $_POST['location'];
        $address= $_POST['address'];
        $tel= $_POST['tel'];
        $user_email= $_POST['user_email'];
        $ref_name1= $_POST['ref_name1'];
        $ref_name2= $_POST['ref_name2'];
        $ref_name3= $_POST['ref_name3'];
        $ref_name4= $_POST['ref_name4'];
        $email1= $_POST['email1'];
        $email2= $_POST['email2'];
        $email3= $_POST['email3'];
        $email4= $_POST['email4'];

        $check_in_table = $db->prepare("SELECT * FROM bclient WHERE client_code=:ccode");
        $check_in_table->bindParam(':ccode',$client_code);
        $check_in_table->execute();
        // echo $location_update_result->rowCount()."update..";
        
     
        if ($client_code!='' AND $name!='' AND $location!='Not Selected' AND $address!='' AND $tel!='' AND $user_email!='' AND $ref_name1!='' AND $email1!='') {
           if (isValidEmail($user_email) AND isValidEmail($email1)) {
            if ($check_in_table->rowCount()>0) {
                $flag='UPDATING';

                  $update_client_table=$db->prepare("UPDATE bclient SET 
                           name=:nm, location=:loc, address=:add, tel=:tele,user_email=:user_email, 
                           ref_name1=:ref_one,ref_name2=:ref_two, ref_name3=:ref_three,
                           ref_name4=:ref_four, email1=:em_one, email2=:em_two,
                           email3=:em_three, email4=:em_four  WHERE client_code=:c_cod");
        
                  $update_client_table->bindParam(':nm', $name);
                  $update_client_table->bindParam(':loc', $location);
                  $update_client_table->bindParam(':add', $address);
                  $update_client_table->bindParam(':tele', $tel);
                  $update_client_table->bindParam(':user_email', $user_email);
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
                    $msg= $updated;
                    $flag='INSERT'; 
                    
                  }else{ $msg=$if_no_change;}
                    foreach ($check_in_table->fetchAll() as $key) {
                        $msg1="This Code Already Exist in ".$key['name'];
                    }

            }elseif($flag=='INSERT' AND $check_in_table->rowCount()==0){
                
                 $result=$db->prepare("INSERT INTO bclient(client_code,name,location,address,tel, user_email,ref_name1,ref_name2,ref_name3,ref_name4,email1,email2,email3,email4)
                    VALUES(:cl_code,:nm,:loc,:add,:tele,:user_email,:ref_one,:ref_two,:ref_three,:ref_four,:em_one,:em_two,:em_three,:em_four)");

                $result->bindParam(':cl_code', $client_code);
                $result->bindParam(':nm', $name);
                $result->bindParam(':loc', $location);
                $result->bindParam(':add', $address);
                $result->bindParam(':tele', $tel);
                $result->bindParam(':user_email', $user_email);
                $result->bindParam(':ref_one', $ref_name1);
                $result->bindParam(':ref_two', $ref_name2);
                $result->bindParam(':ref_three', $ref_name3);
                $result->bindParam(':ref_four', $ref_name4);
                $result->bindParam(':em_one', $email1);
                $result->bindParam(':em_two', $email2);
                $result->bindParam(':em_three', $email3);
                $result->bindParam(':em_four', $email4);

                $result->execute();
                if ($result->rowCount()>0) {

                    $msg=$saved;
                    // echo '<div class="alert alert-success">'.$msg.'</div>';
                }else{$msg=$fail;}    

             }else{$msg="Do nothing";}
           } else {  $msg=$invalid_email; }
        }else{$msg=$empty_filds;}
    break;

    case '#location_form':
        $location_code=$_POST['location_code'];
        $location_name=$_POST['location_name'];

        $check_in_table = $db->prepare("SELECT * FROM location WHERE location_code=:lcode");
        $check_in_table->bindParam(':lcode',$location_code);
        $check_in_table->execute();
        // echo $location_update_result->rowCount()."update..";
        
     
        if ($location_code !='' AND $location_name !='') {
            if ($check_in_table->rowCount()>0) {
                $flag='UPDATING';
                  $update_location_table=$db->prepare("UPDATE location SET location_name=:ln_key WHERE location_code=:lc");
                  $update_location_table->bindParam(':ln_key',$location_name);
                  $update_location_table->bindParam(':lc',$location_code);
                  $update_location_table->execute();
                  if ($update_location_table->rowCount()>0) {
                    $msg= $updated;
                    $flag='INSERT'; 
                    
                  }else{ $msg=$if_no_change;}
                    foreach ($check_in_table->fetchAll() as $key) {
                        $msg1="This Code Already Exist in ".$key['location_name'];
                    }

            }elseif($flag=='INSERT' AND $check_in_table->rowCount()==0){
                $result_for_location=$db->prepare("INSERT INTO location(location_code,location_name)
                    VALUES(:loca_code,:loca_name)");

                $result_for_location->bindParam(':loca_code', $location_code);
                $result_for_location->bindParam(':loca_name', $location_name);
                $result_for_location->execute();
                if ($result_for_location->rowCount()>0) {
                    $flag='UPDATING';
                    $msg=$saved;
                    // echo '<div class="alert alert-success">'.$msg.'</div>';
                }else{$msg=$fail;}
                
            }else{$msg="Do nothing";}
            
        }else{$msg=$empty_filds;}
    break;
    
    case '#user_frm':
        $user_name =$_POST['user_name'];
        $user_code =$_POST['user_code'];
        $client_code_user =$_POST['client_code_user'];
        $password =md5($_POST['password']);
        $is_admin =$_POST['admin'];
        $user_contact =$_POST['user_contact'];
        $email_address =$_POST['email_address'];

        $check_in_table = $db->prepare("SELECT * FROM new_user WHERE user_code=:ucode");
        $check_in_table->bindParam(':ucode',$user_code);
        $check_in_table->execute();
        // echo $location_update_result->rowCount()."update..";
        
     
        if ($user_code!='' AND $user_name!='' AND $user_name!='' AND $client_code_user!='' AND $password!='' AND $is_admin!=''  AND $user_contact!=''  AND $email_address!='') {
          if (!filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) {
            if ($check_in_table->rowCount()>0) {
                $flag='UPDATING';
                    $update_users_table=$db->prepare("UPDATE new_user SET user_name=:user_nm, client_code=:cl_cd,
                          user_password=:pwd, is_admin=:is_adm, user_contact=:user_cont,
                          user_email=:email_add WHERE user_code=:u_cd");

                    $update_users_table->bindParam(':user_nm', $user_name);
                    $update_users_table->bindParam(':cl_cd', $client_code_user);
                    $update_users_table->bindParam(':pwd', $password);
                    $update_users_table->bindParam(':is_adm', $is_admin);
                    $update_users_table->bindParam(':user_cont', $user_contact);
                    $update_users_table->bindParam(':email_add', $email_address);
                    $update_users_table->bindParam(':u_cd', $user_code);
                    $update_users_table->execute();
                  if ($update_users_table->rowCount()>0) {
                    $result=$db->prepare("SELECT * FROM ost_user WHERE email=:email");
                    $result->bindParam(':email',$email_address);
                    $result->execute();
                    foreach ($result->fetchAll() as $row) {
                      $temp_id=$row['id'];
                    }
                    $result=$db->prepare("UPDATE ost_user_account SET username=:u_name WHERE user_id=:id");
                    $result->bindParam(':u_name',$user_name);
                    $result->bindParam(':id',$temp_id);
                    $result->execute();
                    $msg= $updated;
                    $flag='INSERT'; 
                    
                  }else{ $msg=$if_no_change;}
                    foreach ($check_in_table->fetchAll() as $key) {
                        $msg1="This Code Already Exist in ".$key['user_name'];
                    }

            }elseif($flag=='INSERT' AND $check_in_table->rowCount()==0){
                    $result_for_user=$db->prepare("INSERT INTO users(user_name,user_code,client_code,password,is_admins,user_contact,email_address)
                        VALUES(:user_nm,:user_cd,:cl_cd,:pwd,:is_adm,:user_cont,:email_add)");
                    $result_for_user->bindParam(':user_nm', $user_name);
                    $result_for_user->bindParam(':user_cd', $user_code);
                    $result_for_user->bindParam(':cl_cd', $client_code_user);
                    $result_for_user->bindParam(':pwd', $password);
                    $result_for_user->bindParam(':is_adm', $is_admin);
                    $result_for_user->bindParam(':user_cont', $user_contact);
                    $result_for_user->bindParam(':email_add', $email_address);
                    $result_for_user->execute();
                if ($result_for_user->rowCount()>0) {

                    $msg=$saved;
                    // echo '<div class="alert alert-success">'.$msg.'</div>';
                }else{$msg=$fail;}
                
            }else{$msg="Do nothing";}
          } else {  $msg=$invalid_email; }
        }else{$msg=$empty_filds;}
    break;

    case '#products_form':
        $product_code=$_POST['product_code'];
        $product_description=$_POST['product_description'];
        $product_price=$_POST['product_price'];
        $product_ctg_code=$_POST['product_ctg_code'];
        $product_flag=$_POST['product_flag'];
        
        $check_in_table = $db->prepare("SELECT * FROM products WHERE prod_code=:pcode");
        $check_in_table->bindParam(':pcode',$product_code);
        $check_in_table->execute();
        // echo $location_update_result->rowCount()."update..";
        
     
        if ($product_code!='' AND $product_price!='' AND $product_description!=''AND $product_ctg_code!='Not Selected' AND $product_flag!='') {
           if ($check_in_table->rowCount()>0) {
                $flag='UPDATING';
                  $update_products_table=$db->prepare("UPDATE products SET prod_descr=:prod_descr, 
                                        prod_price=:prod_price, prod_ctg_code=:prod_ctg, flag=:prod_flag WHERE prod_code=:prod_code");
            
                  $update_products_table->bindParam(':prod_descr', $product_description);
                  $update_products_table->bindParam(':prod_price', $product_price);
                  $update_products_table->bindParam(':prod_ctg', $product_ctg_code);
                  $update_products_table->bindParam(':prod_flag', $product_flag);
                  $update_products_table->bindParam(':prod_code', $product_code);

                  $update_products_table->execute();
                  if ($update_products_table->rowCount()>0) {
                    $msg= $updated;
                    $flag='INSERT'; 
                    
                  }else{ $msg=$if_no_change;}
                    foreach ($check_in_table->fetchAll() as $key) {
                        $msg1="This Code Already Exist in ".$key['location_name'];
                    }

            }elseif($flag=='INSERT' AND $check_in_table->rowCount()==0){
                $result_for_product=$db->prepare("INSERT INTO products(prod_code,prod_descr,prod_price,prod_ctg_code,flag)
                    VALUES(:prod_code,:prod_descr,:prod_price,:prod_ctg,:prod_flag)");

                $result_for_product->bindParam(':prod_code', $product_code);
                $result_for_product->bindParam(':prod_descr', $product_description);
                $result_for_product->bindParam(':prod_price', $product_price);
                $result_for_product->bindParam(':prod_ctg', $product_ctg_code);
                $result_for_product->bindParam(':prod_flag', $product_flag);
                $result_for_product->execute();
                if ($result_for_location->rowCount()>0) {

                    $msg=$saved;
                    // echo '<div class="alert alert-success">'.$msg.'</div>';
                }else{$msg=$fail;}
                
            }else{$msg="Do nothing";}
            
        }else{$msg=$empty_filds;}
    break;

    case '#product_ctg':
        $products_ctg_code=$_POST['products_ctg_code'];
        $product_ctg_title=$_POST['products_ctg_title'];

        $check_in_table = $db->prepare("SELECT * FROM product_category WHERE prod_ctg_code=:prod_ctg_code");
        $check_in_table->bindParam(':prod_ctg_code',$products_ctg_code);
        $check_in_table->execute();
        // echo $location_update_result->rowCount()."update..";
        
     
        if ($products_ctg_code!='' AND $product_ctg_title!='') {
            if ($check_in_table->rowCount()>0) {
                $flag='UPDATING';
                    $update_product_ctg_table=$db->prepare("UPDATE product_category SET prod_ctg_title=:pctt_key WHERE prod_ctg_code=:pctc");
                    $update_product_ctg_table->bindParam(':pctt_key',$product_ctg_title);
                    $update_product_ctg_table->bindParam(':pctc',$products_ctg_code);
                    $update_product_ctg_table->execute();
                  if ($update_product_ctg_table->rowCount()>0) {
                    $msg= $updated;
                    $flag='INSERT'; 
                    
                  }else{ $msg=$if_no_change;}
                    foreach ($check_in_table->fetchAll() as $key) {
                        $msg1="This Code Already Exist in ".$key['location_name'];
                    }

            }elseif($flag=='INSERT' AND $check_in_table->rowCount()==0){
                $result_for_product=$db->prepare("INSERT INTO product_category(prod_ctg_code, prod_ctg_title)
                VALUES(:prod_c_code,:prod_c_title)");

                $result_for_product->bindParam(':prod_c_code', $products_ctg_code);
                $result_for_product->bindParam(':prod_c_title', $product_ctg_title);
                $result_for_product->execute();
                $result_for_product->rowCount();
                if ($result_for_product->rowCount()>0) {

                    $msg=$saved;
                    // echo '<div class="alert alert-success">'.$msg.'</div>';
                }else{$msg=$fail;}
                
            }else{$msg="Do nothing";}
            
        }else{$msg=$empty_filds;}
    break;

    case 'approve': //This case is true when approve button click by admin on user form
        $user_code = $_POST['user_code'];
        $flag=1; //if it is set then user became a veryfied one
        // $date = date('mdYhisA'); 
        // $date = (float)$date;
        // $link_id=$date;  //unique id 

       $result=$db->prepare("UPDATE new_user SET flag=:flag WHERE user_code=:user_code");
       $result->bindParam(':flag', $flag);
       $result->bindParam(':user_code', $user_code);
       $result->execute();
       if ($result->rowCount()>0) {
            $msg="User approved.";
       }else{$msg="Already approved or something err!";}
    break;

    case 'delete':
        $user_code = $_POST['user_code'];

        $result=$db->prepare("DELETE FROM new_user WHERE user_code=:user_code");
        $result->bindParam(':user_code', $user_code);
        $result->execute();
           if ($result->rowCount()>0) {
            $msg="Deleted.";
           }
    break;

// ***************************
// client registration (Front End Work)
// ***************************
    case '#client_register': //this is for client register form if need use (client_register.php)
        $client_code= $_POST['client_code'];
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

        $date = date('mdYhisA'); 
        $date = (float)$date;
        $link_id=$date;

            $check_in_table = $db->prepare("SELECT * FROM clients_register WHERE client_code=:ccode");
            $check_in_table->bindParam(':ccode',$client_code);
            $check_in_table->execute();
            // echo $location_update_result->rowCount()."update..";
            $msg="";

            if ($client_code=='' OR $name=='' OR $location=='' OR $address=='' OR $ref_name1=='' OR $email1=='') {
                $msg="Fields are required";
            }elseif ($check_in_table->rowCount()>0) {

                foreach ($check_in_table->fetchAll() as $key) {
                    $msg="This client code already exist in database, Please try different!";
                }
                
            }else{

            $result=$db->prepare("INSERT INTO clients_register(client_code,name,location,address,tel,ref_name1,ref_name2,ref_name3,ref_name4,email1,email2,email3,email4,link_id)
                    VALUES(:cl_code,:nm,:loc,:add,:tele,:ref_one,:ref_two,:ref_three,:ref_four,:em_one,:em_two,:em_three,:em_four,:link_id)");

            $result->bindParam(':cl_code', $client_code);
            $result->bindParam(':nm', $name);
            $result->bindParam(':loc', $location);
            $result->bindParam(':add', $address);
            $result->bindParam(':tele', $tel);
            $result->bindParam(':ref_one', $ref_name1);
            $result->bindParam(':ref_two', $ref_name2);
            $result->bindParam(':ref_three', $ref_name3);
            $result->bindParam(':ref_four', $ref_name4);
            $result->bindParam(':em_one', $email1);
            $result->bindParam(':em_two', $email2);
            $result->bindParam(':em_three', $email3);
            $result->bindParam(':em_four', $email4);
            $result->bindParam(':link_id', $link_id);

            $result->execute();
            // echo $rows;
            if ($result->rowCount()>0) {
                $msg="Form Submitted Successfuly...";
                    // echo '<div class="alert alert-success">'.$msg.'</div>';
             }else{$msg="Something error..";}
            }
        break;

    case '#signup':
            $user_code =$_POST['user_code'];
            $user_name =$_POST['user_name'];
            $user_password =md5($_POST['user_password']);
            $confirm_user_password =md5($_POST['confirm_user_password']);
            $user_location =$_POST['location'];
            $user_address =$_POST['user_address'];
            $user_contact =$_POST['user_contact'];
            $user_email =$_POST['user_email'];
            $user_ref_name =$_POST['user_ref_name'];
            $user_ref_email =$_POST['user_ref_email'];
            $user_flag=0; //for user $flag=0, For admin $flag=1

            // Generating client code
            $client_code="chain_".strtolower($user_code);

            $date = date('mdYhisA'); 
            $date = (float)$date;
            $link_id=$date;

            $check_in_table = $db->prepare("SELECT * FROM new_user WHERE user_code=:user_code OR user_email=:user_email");
            $check_in_table->bindParam(':user_code',$user_code);
            $check_in_table->bindParam(':user_email',$user_email);
            $check_in_table->execute();

            if ($user_code !='' AND $user_name!='' AND $user_password!='' AND $confirm_user_password!='' AND $user_location!='Not Selected' AND $user_address !='' AND $user_contact!='' AND $user_email!='' AND $user_ref_name!='' AND $user_ref_email!='') {
              if ($check_in_table->rowCount()==0) {
                 if ($user_password == $confirm_user_password) {
                     if (!filter_var($user_email, FILTER_VALIDATE_EMAIL) === false AND !filter_var($user_ref_email, FILTER_VALIDATE_EMAIL) === false) {
                      $result_for_new_user=$db->prepare("INSERT INTO new_user (user_code, user_name, user_password, user_location, user_address, user_contact, user_email, user_ref_name, user_ref_email, is_admin,link_id, client_code)
                                                       VALUES(:c1,:c2,:c3,:c4,:c5,:c6,:c7,:c8,:c9,:c10,:c11,:c12)");

                          $result_for_new_user->bindParam(':c1', $user_code);
                          $result_for_new_user->bindParam(':c2', $user_name);
                          $result_for_new_user->bindParam(':c3', $user_password);
                          $result_for_new_user->bindParam(':c4', $user_location);
                          $result_for_new_user->bindParam(':c5', $user_address);
                          $result_for_new_user->bindParam(':c6', $user_contact);
                          $result_for_new_user->bindParam(':c7', $user_email);
                          $result_for_new_user->bindParam(':c8', $user_ref_name);
                          $result_for_new_user->bindParam(':c9', $user_ref_email);
                          $result_for_new_user->bindParam(':c10', $user_flag);
                          $result_for_new_user->bindParam(':c11',$link_id);
                          $result_for_new_user->bindParam(':c12',$client_code);
                          $result_for_new_user->execute();

                        $result_for_bclient=$db->prepare("INSERT INTO bclient (client_code, name, location, address, tel, user_email, ref_name1, email1)
                                                       VALUES(:c1,:c2,:c3,:c4,:c5,:c6,:c7,:c8)");

                          $result_for_bclient->bindParam(':c1', $client_code);
                          $result_for_bclient->bindParam(':c2', $user_name);
                          $result_for_bclient->bindParam(':c3', $user_location);
                          $result_for_bclient->bindParam(':c4', $user_address);
                          $result_for_bclient->bindParam(':c5', $user_contact);
                          $result_for_bclient->bindParam(':c6', $user_email);
                          $result_for_bclient->bindParam(':c7', $user_ref_name);
                          $result_for_bclient->bindParam(':c8', $user_ref_email);
                          $result_for_bclient->execute();
                          // $result_for_bclient->rowCount();
                    if ($result_for_new_user->rowCount()>0) {
                      $to=$user_email;
                      $subject="Your confirmation mail";
                      // $mail_body="pleae Click this link to varify "."<a href='#'>".$link_id."</a>";
                      $base_url="http://chain-el.com/";
                      $mail_body = "To activate your account, please click on this link: ".$base_url . 'php/activate.php?email='.$user_code . "&key=$link_id";
                      $headers = 'From: <admin@chain-el.com>' . "\n";

                      if (mail($to,$subject,$mail_body,$headers)) {
                        $msg="Request successfull, Please check your mail to activate your account!.";
                      }else{$msg="Somthing went wrong";}                     
                    }else{$msg="Error!";}

                    // Code for inserting data into osticket user
                     // $date =date('Y-m-d H:i:s'); 
                    $ost_result1=$db->prepare("INSERT INTO ost_user(name, created, updated,email)
                                                   VALUES(:c1,NOW(),NOW(), :c2)");
                      $ost_result1->bindParam(':c1', $user_name);
                      $ost_result1->bindParam(':c2', $user_email);
                      // $ost_result1->bindParam(':c3', $date);
                      $ost_result1->execute();

                    $result=$db->prepare("SELECT * FROM ost_user WHERE email=:c1");
                    $result->bindParam(':c1', $user_email);
                    $result->execute();
                     foreach ($result->fetchAll() as $row) {
                        $temp_user_id=$row['id'];
                      } 
                    $ost_result2=$db->prepare("INSERT INTO ost_user_email(user_id, address)
                                                   VALUES(:c1,:c2)");
                      $ost_result2->bindParam(':c1', $temp_user_id);
                      $ost_result2->bindParam(':c2', $user_email);
                      $ost_result2->execute();

                    $ost_result2=$db->prepare("INSERT INTO ost_user_account(user_id, username, passwd)
                                                   VALUES(:c1,:c2,:c3)");
                      $ost_result2->bindParam(':c1', $temp_user_id);
                      $ost_result2->bindParam(':c2', $user_name);
                      $ost_result2->bindParam(':c3', $user_password);
                      $ost_result2->execute();

                    $result=$db->prepare("SELECT * FROM ost_user_email WHERE address=:c1");
                    $result->bindParam(':c1', $user_email);
                    $result->execute();
                     foreach ($result->fetchAll() as $row) {
                        $temp_email_id=$row['id'];
                      }
                    $result=$db->prepare("UPDATE ost_user SET default_email_id=:c1 WHERE email=:c2");
                    $result->bindParam(':c1', $temp_email_id);
                    $result->bindParam(':c2', $user_email);
                    $result->execute();

                     }else{ $msg=$invalid_email;}
                 }else{$msg = "Password Mismatch. ";}
              }else{$msg = "This User id or Email already exist in database, Try different."; }
            }else{$msg=$empty_filds;}
    break;

    case '#user_profile_form': //updating registration for new user on edit_client_form.php
      $client_code= $_POST['client_code'];
      // $client_code= $_POST['code'];
      $name= $_POST['name'];
      $location= $_POST['location'];
      $address= $_POST['address'];
      $tel= $_POST['tel'];
      $user_email= $_POST['user_email'];
      $ref_name1= $_POST['ref_name1'];
      $ref_name2= $_POST['ref_name2'];
      $ref_name3= $_POST['ref_name3'];
      $ref_name4= $_POST['ref_name4'];
      $email1= $_POST['email1'];
      $email2= $_POST['email2'];
      $email3= $_POST['email3'];
      $email4= $_POST['email4'];

        $date = date('mdYhisA'); 
        $date = (float)$date;
        $link_id=$date;

      if ($client_code=='' OR $name=='' OR $location=='Not Selected' OR $address=='' OR $tel=='' OR $user_email=='' OR $ref_name1=='' OR $email1=='') {
      $msg=$empty_filds;
      }else{

        $update_client_table=$db->prepare("UPDATE new_user SET 
                           user_name=:nm, user_location=:loc, user_address=:add, user_contact=:tele,user_email=:user_email, 
                           user_ref_name=:ref_one,user_ref_name2=:ref_two, user_ref_name3=:ref_three,
                           user_ref_name4=:ref_four, user_ref_email=:em_one, user_ref_email2=:em_two,
                           user_ref_email3=:em_three, user_ref_email4=:em_four  WHERE user_code=:c_cod");
        
          $update_client_table->bindParam(':nm', $name);
          $update_client_table->bindParam(':loc', $location);
          $update_client_table->bindParam(':add', $address);
          $update_client_table->bindParam(':tele', $tel);
          $update_client_table->bindParam(':user_email', $user_email);
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
            $msg=$updated;
        }else{ $msg=$if_no_change;}
      }
    break;
    
    case '#change_password_form':
        session_start();
        $user_code=$_SESSION['user_id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
          
        if ($current_password=='' OR $new_password=='' OR $confirm_password=='') {
        $msg= "Fields are required...";
        }else{
            $result = $db->prepare("SELECT * FROM new_user WHERE user_password=:pwd AND (user_code=:user_code OR user_email=:user_email)");
            $result->bindParam(":user_code",$user_code);
            $result->bindParam(":user_email",$user_code);
            $result->bindParam(":pwd",$current_password);
            $result->execute();
            $row=$result->rowcount();

            

          if ($row==1) {
            foreach ($result->fetchAll() as $row) {
              $temp_email=$row['user_email'];
            }
              if ($new_password==$confirm_password) {
                $update_pwd= $db->prepare("UPDATE new_user set user_password='$new_password' WHERE user_code='$user_code' OR user_email='$user_code'");
                $update_pwd->execute();

                $select = $db->prepare("SELECT * FROM ost_user_email WHERE address='$temp_email'");
                $select->execute();
                foreach ($select->fetchAll() as $row) {
                  $temp_uid=$row['user_id'];
                }
                // $new_pwd=$_POST['new_password'];
                $update_pwd= $db->prepare("UPDATE ost_user_account set passwd='$new_password' WHERE user_id='$temp_uid'");
                $update_pwd->execute();
                $_SESSION['u_password']=$_POST['new_password'];

              $msg= "Password change succefully...";
              }else{
              // echo "Password mismatch...";
              $msg= "Password Mismatch...";
              }

          }else{ $msg= "Current Password is wrong...";}
        }
    break;


//To reset password code
    case '#resetPwd1':
        $to = $_POST['user_email'];

        $subject="Password Reset";
        $base_url="http://chain-el.com/";
        $mail_body = "To reset account password, please click on this link: ".$base_url . 'user_pwd_reset2.php?email='.$to;
        $headers = 'From: <admin@chainel.com>' . "\r\n";
        
        $result=$db->prepare("SELECT * FROM new_user WHERE user_email=:user_email");
        $result->bindParam(':user_email',$to);
        $result->execute();
        if ($to !='') {
          if (!filter_var($to, FILTER_VALIDATE_EMAIL) === false ) {
            if ($result->rowCount()>0) {
              if (mail($to,$subject,$mail_body,$headers)) {
                $msg="Please check your mail to reset password.";
              }else{$msg="Somthing went wrong, Try letter.";}
            }else{$msg="This is not registerd email, Please enter your registerd email.";}
          }else{$msg=$invalid_email;}
        }else{$msg=$empty_filds;}
    break;

//To reset password final code 
    case '#resetPwd2':
      $user_email = $_GET['user_email'];
      $password = md5($_POST['password']);
      $confirm_password = md5($_POST['confirm_password']);

      if ($password=='' OR $confirm_password=='') {
        if ($password==$confirm_password) {
        $result=$db->prepare("UPDATE new_user SET user_password=:user_password WHERE user_email=:user_email");
        $result->bindParam(':user_password',$password);
        $result->bindParam(':user_email',$user_email);
        $result->execute();
        if ($result->rowCount()>0) {
           $msg= "Password reset successfully.";
          }else{ $msg= "Please try letter!";}
        }else{ $msg= "Password Missmatch!";}
      }else{$msg="Fields are required!";}
    break;

// Online appointment from user
    case '#appointment_frm':
        session_start();
        $user_id=$_SESSION['user_id'];
        $kind_of_visit=$_POST['kov'];
        $reuested_employee=$_POST['req_emp'];
        $appointment_date=$_POST['app_date'];
        $remarks=$_POST['remarks'];
        $login_info=$_POST['login_info'];

        if ($kind_of_visit !='Not Selected' AND $reuested_employee !='Not Selected' AND $appointment_date!='' AND $remarks!='' AND $login_info!='') {
           $sql="INSERT INTO appointment(user_code, appointment_date, remarks, kind_of_visit, requested_employee, login_info)
                            VALUES(:c1, :c2, :c3, :c4, :c5, :c6)";
            $result=$db->prepare($sql);
            $result->bindParam(':c1', $user_id);
            $result->bindParam(':c2', $appointment_date);
            $result->bindParam(':c3', $remarks);
            $result->bindParam(':c4', $kind_of_visit);
            $result->bindParam(':c5', $reuested_employee);
            $result->bindParam(':c6', $login_info);
            $result->execute();
            if ($result->rowCount()>0) {
                // Mail to appointment requested emp
                  $to=$reuested_employee;
                  $subject="Appointment";
                  // $mail_body="pleae Click this link to varify "."<a href='#'>".$link_id."</a>";
                  $base_url="http://chain-el.com/";
                  $mail_body="A request for appointment from user id <b>$user_id</b> just created on appointment date <b>$appointment_date</b> please check! <br>"."<table><tbody>
                            <tr>
                             <td>$kind_of_visit : </td>
                             <td><b>$requested_employee</b></td>
                            </tr>
                            </tbody></table><br><br>
                            <p><b>Thanks!</b></p>";
                  $headers  = 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";                 
                  $headers .= 'From: <admin@chain-el.com>' . "\n";

                if (mail($to,$subject,$mail_body,$headers)) {
                    $msg='Appointment Fix!';
                // Mail to appointment user
                  $to=$_SESSION['user_email'];
                  // $to='dbnerddb@gmail.com';
                  $subject="Appointment With Chainel";
                  $mail_body="<html><body>";
                  $mail_body.="<p>Hi! <b>".$user_id."</b><br> You have just created an appointment with our emplloyee  your appointment date is <b>".$appointment_date."</b><br></p>";
                  $mail_body.="<p><br><br>Thanks!</p>". "\n";
                  $mail_body.="<img src='http://chain-el.com/images/company_logo.png'>";
                  $mail_body.="</body></html>";

                  mail($to,$subject,$mail_body,$headers);
                }else{$msg="Somthing went wrong";}
                
            }else{$msg='appointment not';}  
        }else{$msg=$empty_fields;}
    break;
    
    case 'open_appointment':
        $appointment_id=$_POST['app_id'];
        $attendent='No';
        $result=$db->prepare("SELECT * FROM appointment WHERE id=:id AND attendent=:attendent");
        $result->bindParam(':id', $appointment_id);
        $result->bindParam(':attendent', $attendent);
        $result->execute();
        if ($result->rowCount()>0) {
           $result=$db->prepare("UPDATE appointment SET attendent='Yes' WHERE id=:id");
           $result->bindParam(':id', $appointment_id);
           $result->execute();
           $msg='Appointment Successfully Opened!';
        }else{$msg='Already Open!';}

    break;

    case 'close_appointment':
        $appointment_id=$_POST['app_id'];
        $attendent='Yes';
        $result=$db->prepare("SELECT * FROM appointment WHERE id=:id AND attendent=:attendent");
        $result->bindParam(':id', $appointment_id);
        $result->bindParam(':attendent', $attendent);
        $result->execute();
        if ($result->rowCount()>0) {
           $result=$db->prepare("UPDATE appointment SET attendent='No' WHERE id=:id");
           $result->bindParam(':id', $appointment_id);
           $result->execute();
           $msg='Appointment Successfully Closed!';
        }else{$msg='Already Close!';}

    break;

    default:
        # code...
    break;
}
    
 
// echo '<div class="alert alert-success">'.$msg.'</div>';
echo $msg;
// print_r($_POST);
?>

