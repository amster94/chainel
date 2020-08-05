<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">

<?php
/*********************************************************************
    open.php

    New tickets handle.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2013 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
session_start();
// if login invalid page redirect to given link
ini_set('display_errors',0);
$auth = $_SESSION['_auth'];
// print_r($auth['user']);
$id=$auth['user'];
if(isset($_SESSION['user_id']) OR isset($id['id'])){
}else{
header( 'Location: http://chain-el.com/' );
exit();
}

require('client.inc.php');
define('SOURCE','Web'); //Ticket source.
$ticket = null;
$errors=array();
if ($_POST) {
    $vars = $_POST;
    $vars['deptId']=$vars['emailId']=0; //Just Making sure we don't accept crap...only topicId is expected.
    if ($thisclient) {
      $vars['uid']=$thisclient->getId();
    } elseif($cfg->isCaptchaEnabled()) {
        if(!$_POST['captcha'])
            $errors['captcha']=__('Enter text shown on the image');
        elseif(strcmp($_SESSION['captcha'], md5(strtoupper($_POST['captcha']))))
            $errors['captcha']=__('Invalid - try again!');
    }

    $tform = TicketForm::objects()->one()->getForm($vars);
    $messageField = $tform->getField('message');
    $attachments = $messageField->getWidget()->getAttachments();
    if (!$errors && $messageField->isAttachmentsEnabled())
        $vars['cannedattachments'] = $attachments->getClean();

    // Drop the draft.. If there are validation errors, the content
    // submitted will be displayed back to the user
    Draft::deleteForNamespace('ticket.client.'.substr(session_id(), -12));
    //Ticket::create...checks for errors..
    if(($ticket=Ticket::create($vars, $errors, SOURCE))){
        // mail to admin to notify ticket
        // print_r($_POST);
        $array=$_POST;
         $ticket_desc= $_POST['message'];
        $temp_arr=array();
        foreach ($array as $key =>$val) {
            array_push($temp_arr,$val);
            // echo $val.' '.'<br>';
        }
        // print_r($temp_arr);
        $ticket_title= $temp_arr[8];
        // $ticket_desc= $temp_arr[8];        
        $user_email=$_SESSION['user_email'];
        $user_name=$_SESSION['user_name'];
        $user_code=$_SESSION['client_code_user'];
          $to='yusuf@chain-el.com';
          $subject="Client Ticket Notify"; 
          $mail_body='User name '.$user_name.' with user id '.$user_code.' just created a new ticket.!'. "\n\n\n".
                    'Ticket title : '.$ticket_title."\n\n".'Ticket description : '.$ticket_desc."\n\n".'please check!';         
          $headers = 'From: <'.$user_email.'>'. "\n";
          if (mail($to,$subject,$mail_body,$headers)) {
            // echo $msg="mail sent";
          }

        $msg=__('Support ticket request created');
         
        // Drop session-backed form data
        unset($_SESSION[':form-data']);
        //Logged in...simply view the newly created ticket.
        if($thisclient && $thisclient->isValid()) {
            session_write_close();
            session_regenerate_id();
            @header('Location: tickets.php?id='.$ticket->getId());
        }
    }else{
        $errors['err']=$errors['err']?$errors['err']:__('Unable to create a ticket. Please correct errors below and try again!');
    }
}

//page
$nav->setActiveNav('new');
if ($cfg->isClientLoginRequired()) {
    if (!$thisclient) {
        require_once 'secure.inc.php';
    }
    elseif ($thisclient->isGuest()) {
        require_once 'login.php';
        exit();
    }
}

require(CLIENTINC_DIR.'header.inc.php');
if($ticket
        && (
            (($topic = $ticket->getTopic()) && ($page = $topic->getPage()))
            || ($page = $cfg->getThankYouPage())
        )) {
    // Thank the user and promise speedy resolution!
    echo Format::viewableImages($ticket->replaceVars($page->getBody()));
}
else {
    require(CLIENTINC_DIR.'open.inc.php');
}
require(CLIENTINC_DIR.'footer.inc.php');
?>

<?php 
$user_id= $_SESSION['user_id']; 
require_once ('../php/connect_pdo.php');
$result=$db->prepare("SELECT * FROM new_user WHERE user_code=:uc OR user_email=:ue");
$result->bindParam(':uc',$user_id);
$result->bindParam(':ue',$user_id);
$result->execute();
 if ($result->rowCount()>0) {
     foreach ($result->fetchAll() as $row) {
         $user_email=$row['user_email'];
         $user_name=$row['user_name'];
         $user_contact=$row['user_contact'];
     }
 }
?>
<script type="text/javascript">
$(document).ready(function(){
    var disc=$('.redactor_richtext').text();
    $('input[placeholder="email1"]').val('<?php echo $user_email; ?>').prop("readOnly", true);
    $('input[placeholder="full name1"]').val('<?php echo $user_name; ?>').prop("readOnly", true);
    $('input[placeholder="phone1"]').val('<?php echo $user_contact; ?>').prop("readOnly", true);
    $('[name =7ae7ec4121df2fcc-ext]').val("91").prop("readOnly", true);

// script for selecting issue summary

$('[data-prompt="Select related issue"]').change(function(){
    var value = $(this).val();
    $('input[placeholder="Issue."]').val(value+' : ');
    console.log(value);
  });
});

 
</script>
<?php 
session_start();
ini_set('display_errors',0);
$email =$_SESSION['user_email'];
$pwd =$_SESSION['u_password'];
?>
<script type="text/javascript">
 $(document).ready(function(){
    $('.status').click(function(){
        var luser='<?php echo $email; ?>';
        var lpasswd='<?php echo $pwd; ?>';
        var dataString = 'luser='+ luser+'&lpasswd='+ lpasswd;
        // alert(dataString);
        $.ajax({
            type:"POST",
            url:"login.php",
            data:dataString,
            cache:true,
            success:function(response) {
                // document.getElementById('msgc').innerHTML=response;// alert(response);
                 document.location.reload(true);
                 window.location.reload(true);
               // window.location.href = 'http://localhost/project/chainel/ticket/tickets.php';
                window.location.href = 'http://chain-el.com/ticket/tickets.php';
            }
        });
    });
 });
</script>