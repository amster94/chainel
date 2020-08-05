<?php
session_start();
header('Cache-control: private'); // IE 6 FIX

if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];

// register the session and set the cookie
$_SESSION['lang'] = $lang;

setcookie("lang", $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}

switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;

  case 'ar':
  $lang_file = 'lang.ar.php';
  echo "<script> 
      		$(document).ready(function(){
      			$('p, input,textarea, td, th, h2, h3, h4, label, ul').attr('dir', 'rtl');
            $('.company_logo h3').attr('dir', 'ltr');
            $('.col-md-8').addClass('pull-right');
            $('.col-md-4').addClass('pull-left');
            
            $('.col-md-3').addClass('pull-right');
            $('.col-md-9').addClass('pull-left');

            $('.col-md-6').addClass('pull-right');
            $('.col-md-5').addClass('pull-left');
            $('.nav').addClass('navbar-right');
            $('#logout').addClass('navbar-left');
            $('#logout').css({'margin-right':'480px'});
      			$('#ticket_log').css({'margin-right':'300px'});

            
      		});
      	</script>";

  break;

  default:
  $lang_file = 'lang.en.php';

}
include_once 'languages/'.$lang_file;
?>