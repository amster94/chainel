<?php
/*********************************************************************
    index.php

    Helpdesk landing page. Please customize it to fit your needs.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2013 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
// If login is not valid go to index page
// define('ROOTPATH', __DIR__);
ini_set('display_errors',0);
session_start();
$auth = $_SESSION['_auth'];
// print_r($auth['user']);
$id=$auth['user'];
if(isset($_SESSION['user_id']) OR isset($id['id'])){
}else{
header( 'Location: http://chain-el.com/' );
exit();
}

require('client.inc.php');
$section = 'home';
require(CLIENTINC_DIR.'header.inc.php');
?>
<div class="row col-md-3" >
    <?php 
    include 'user_menu.php';
     ?>
</div><!-- col-md-4 -->
<div class="row col-md-9">
    <div id="landing_page">
    <?php
    if($cfg && ($page = $cfg->getLandingPage()))
        echo $page->getBodyWithImages();
    else
        echo  '<h1>'.__('Welcome to the Support Center').'</h1>';
    ?>
    <div id="new_ticket" class="pull-left">
        <h3><?php echo __('Open a New Ticket');?></h3>
        <br>
        <div><?php echo __('Please provide as much detail as possible so we can best assist you. To update a previously submitted ticket, please login.');?></div>
    </div>

    <div id="check_status" class="pull-right">
        <h3><?php echo __('Check Ticket Status');?></h3>
        <br>
        <div><?php echo __('We provide archives and history of all your current and past support requests complete with responses.');?></div>
    </div>

    <div class="clear"></div>
    <div class="front-page-button pull-left">
        <p>
            <a href="open.php" class="green button"><?php echo __('Open a New Ticket');?></a>
        </p>
    </div>
    <div class="front-page-button pull-right">
        <p>
            <a href="<?php if(is_object($thisclient)){ echo 'tickets.php';} else {echo 'tickets.php';}?>" class="blue button status"><?php echo __('Check Ticket Status');?></a>
        </p>
    </div>
</div>
<br><br><br><br>
<!-- Code for all ticket goes here -->
    <div class="table-responsive">
            <table class="table  table-striped table-bordered table-hover">
              <tr class="success">
               <!--  <th>Ticket No.</th>
                <th>Issue Sum.</th>
                <th>Issue Detail</th>
                <th>Date</th>
                <th>Status</th> -->
              </tr>
              <tbody id="" class="scroll">
              <?php  
                    session_start();
                    $user_id= $_SESSION['user_id']; 
                    require_once ('../php/connect_pdo.php');
                    $result=$db->prepare("SELECT * FROM new_user WHERE user_code=:uc OR user_email=:ue");
                    $result->bindParam(':uc',$user_id);
                    $result->bindParam(':ue',$user_id);
                    $result->execute();
                    if ($result->rowCount()>0) {
                         foreach ($result->fetchAll() as $row) {
                            // echo '<p><b>User Email: </b>'.'<a>'.$user_email=$row['user_email'].'</a></p>';
                             $user_code=$row['user_code'];
                             $user_name=$row['user_name'];
                             $user_contact=$row['user_contact'];
                         }

                        // $query="SELECT ost_user_email.address, ost_ticket_thread.title,ost_ticket_thread.body,ost_ticket_thread.created,ost_ticket.number,ost_ticket.user_id,ost_ticket_status.state FROM ost_user_email, ost_ticket_thread,ost_ticket,ost_ticket_status WHERE ost_user_email.id=ost_ticket_status.id AND ost_user_email.id=ost_ticket.ticket_id AND ost_user_email.id=ost_ticket_thread.id AND ost_user_email.address=:ost_email";
                        $query="SELECT DISTINCT ost_ticket.number, ost_ticket_thread.title,ost_ticket_thread.body,CAST(ost_ticket_thread.created AS DATE) AS created_date , ost_ticket.status_id FROM ost_ticket, ost_ticket_thread WHERE ost_ticket.user_id=ost_ticket_thread.user_id AND ost_ticket.user_id=:uid ";
                        // $query="SELECT * FROM ost_ticket WHERE user_id=:uid";
                        $result2=$db->prepare($query);
                        $result2->bindParam(':uid',$user_code);
                        $result2->execute();
                        if ($result2->rowCount()>0) {
                            foreach ($result2->fetchAll() as $row) {
                                if ($row['status_id']==1) {
                                    $status='Open';
                                }elseif ($row['status_id']==2) {
                                    $status='Resolved';
                                }elseif ($row['status_id']==3) {
                                    $status='Closed';
                                }?>
                                
                                <!-- echo $row['state'].; -->
                                <!-- <tr>
                                    <td><?php echo $row['number']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['body']; ?></td>
                                    <td><?php echo $row['created_date']; ?></td>
                                    <td><?php echo $status; ?></td>
                                </tr> -->
                            <?php }
                        }else{
                            // echo "No match found!";
                        }
                    }?>
              </tbody>  
            </table>
    </div><!-- table-responsive -->
<!-- Code for all ticket end here -->
</div><!-- col-md-8 -->

<div class="clear"></div>
<?php
if($cfg && $cfg->isKnowledgebaseEnabled()){
    //FIXME: provide ability to feature or select random FAQs ??
?>
<p><?php echo sprintf(
    __('Be sure to browse our %s before opening a ticket'),
    sprintf('<a href="kb/index.php">%s</a>',
        __('Frequently Asked Questions (FAQs)')
    )); ?></p>
</div>
<?php
} ?>
<?php require(CLIENTINC_DIR.'footer.inc.php'); ?>

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
                // $('#clientLogin').hide();
                // document.getElementById('msgc').innerHTML=response;// alert(response);
                 // document.location.reload(true);
                 // window.location.reload(true);
               // $(location).attr('href', 'http://localhost/project/chainel/ticket/tickets.php')
                window.location.href = 'http://localhost/project/chainel/ticket/tickets.php';
                // window.location.href = 'http://chain-el.com/ticket/tickets.php';
            }
        });
    });
 });
</script>