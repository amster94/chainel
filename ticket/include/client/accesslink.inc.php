<?php
if(!defined('OSTCLIENTINC')) die('Access Denied');

$email=Format::input($_POST['lemail']?$_POST['lemail']:$_GET['e']);
$ticketid=Format::input($_POST['lticket']?$_POST['lticket']:$_GET['t']);

if ($cfg->isClientEmailVerificationRequired())
    $button = __("Email Access Link");
else
    $button = __("View Ticket");
?>
<h1><?php echo __('Check Ticket Status'); ?></h1>
<p><?php
echo __('Please provide your email address and a ticket number.');
if ($cfg->isClientEmailVerificationRequired())
    echo ' '.__('An access link will be emailed to you.');
else
    echo ' '.__('This will sign you in to view your ticket.');
?></p>
<form action="login.php" method="post" id="clientLogin">
    <?php csrf_token(); ?>
<div style="display:table-row">
    <div class="login-box">
    <div><strong><?php echo Format::htmlchars($errors['login']); ?></strong></div>
    <div>
        <label for="email" class="pull-left left_align"><?php echo __('E-Mail Address'); ?>:</label>
        <input id="email" placeholder="<?php echo __('e.g. john.doe@osticket.com'); ?>" type="text"
            name="lemail" size="30" value="<?php echo $email; ?>">
    </div>
    <div>
        <label for="ticketno" class="pull-left left_align"><?php echo __('Ticket Number'); ?>:</label>
        <input id="ticketno" type="text" name="lticket" placeholder="<?php echo __('e.g. 051243'); ?>"
            size="30" value="<?php echo $ticketid; ?>">
    </div>
    <p>
        <input id="email_access" class="btn" type="submit" value="<?php echo $button; ?>">
    </p>
    </div>
    
</div>
</form>
<br>
<p>
<?php echo sprintf(
__("If this is your first time contacting us or you've lost the ticket number, please %s open a new ticket %s"),
    '<a href="open.php">','</a>'); ?>
</p>
