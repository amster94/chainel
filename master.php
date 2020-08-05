<!DOCTYPE html>
<html>
<head>
    <title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <script type="text/javascript" src="js/angular.min.js" ></script>
    <script src="js/jquery-1.9.1.min.js" ></script>
    
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
    
    <link rel="stylesheet" type="text/css" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script> 
    <script src="js/custom-js.js" ></script>
    <link rel="stylesheet" type="text/css" href="css/custom_table.css">
<script type="text/javascript" src="js/custom_table.js"></script>
</head>
<?php
// session_start();
ini_set('display_errors',0);
include 'common.php'; //for change language common file 
// If login is not valid go to index page
if(isset($_SESSION['admin_user_id'])){
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index");
exit();
}
?>
<body>
<div class="container-fluid">
    <div class="row master_header">
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        <div id="menu-toggle" class="toggle"><i class="fa fa-bars fa-2x">dd</i></div>
        <div class="col-md-4 user-icon pull-left"><h2>Hello! <i><b><?php echo $_SESSION['admin_name']; ?></b> </i></h2></div> 
        <div class="col-md-2 pull-right"><h3><a href="php/logout.php"><?php echo $lang['MENU_LOGOUT']; ?></a></div></h3>
    </div>

      <div class="row">
      <div  class="col-md-2 master_list">
        <?php include 'master_menu.html'; ?>
      </div><!-- col-md-2 master_list -->

    <div class="col-md-6 forms">
      <div id="loader_container"><p id="loader">Wait...</p></div>
        <!-- <p id="txtHint"></p> -->
        <div class="client_menu"><?php include 'admin_frm/client_form.php'; ?></div>
        <div class="location_menu"><?php include 'admin_frm/location_form.php'; ?></div>
        <div class="users_menu"><?php include 'admin_frm/user_form.php'; ?></div>
        <div class="product_menu"><?php include 'admin_frm/product_form.php'; ?></div>
        <div class="product_category_menu"><?php include 'admin_frm/product_category_form.php'; ?></div>
        <div class="reqested_orders_menu"><?php include 'admin_frm/requested_orders_list.php'; ?></div>
        <div class="approved_order_menu"><?php include 'admin_frm/approved_orders_list.php'; ?></div>
        <div class="appointment"><?php include 'admin_frm/appointment.php'; ?></div>
        <div class="news"><?php include 'news/news_panel.php'; ?></div>
      </div> <!--  col-md-10 forms -->
    </div><!-- row -->
</div><!-- container -->
<script>
// code for master list hide and show form
$(document).ready(function(){
    $('#loader_container').hide();
    $(".location_menu").hide();
    $(".users_menu").hide();
  $(".product_menu").hide();
  $(".product_category_menu").hide();
  $(".reqested_orders_menu").hide();
  $(".approved_order_menu").hide();
  $(".appointment").hide();
  $(".news").hide();
  // $(".prod_cate_menu").hide();
 $("#msg").show();


    $("#client_menu").click(function(){
        $(".client_menu").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut("3000");
        $(".appointment").fadeOut("3000");
        // $("#msg").fadeOut("3000");
        $( "*" ).prop( "disabled", false );
 // $("input[type=text],input[type=email],input[type=number],select, textarea").val("");
        // $(".client").show();
        $(".news").fadeOut("3000");
    });

    $("#location_menu").click(function(){
        $(".location_menu").delay("400").fadeIn("3000");
        $(".client_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut("3000");

       $(".appointment").fadeOut("3000");
        $(".news").fadeOut("3000");
    });

    $("#users_menu").click(function(){
        $(".users_menu").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".client_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut("3000");
        $(".appointment").fadeOut("3000");
        $(".news").fadeOut("3000");
    });

    $("#product_menu").click(function(){
        $(".product_menu").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".client_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut("3000");
        $(".appointment").fadeOut("3000");
        $(".news").fadeOut("3000");
        
    });

    $("#product_category_menu").click(function(){
        $(".product_category_menu").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".client_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut("3000");
        $(".appointment").fadeOut("3000");
        $(".news").fadeOut("3000");
        
    });

    $("#reqested_orders_menu").click(function(){
        $(".reqested_orders_menu").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".client_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut();
        $(".appointment").fadeOut("3000");
        $(".news").fadeOut("3000");
    });

    $("#approved_order_menu").click(function(){
        $(".approved_order_menu").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".client_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".news").fadeOut("3000");
        $(".appointment").fadeOut("3000");
    });

    $("#news").click(function(){
        $(".news").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".client_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut("3000");
        $(".appointment").fadeOut("3000");
    });
    $("#appointment").click(function(){
        $(".appointment").delay("400").fadeIn("3000");
        $(".location_menu").fadeOut("3000");
        $(".client_menu").fadeOut("3000");
        $(".users_menu").fadeOut("3000");
        $(".product_menu").fadeOut("3000");
        $(".product_category_menu").fadeOut("3000");
        $(".reqested_orders_menu").fadeOut("3000");
        $(".approved_order_menu").fadeOut("3000");
        $(".news").fadeOut("3000");
    });
    
});
</script>
<script>

$(window).ready(function(){
    if ($(window).width() <= 900){  
        $("#sidebar-wrapper ul li").click(function(e) {
            // e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            // $("body").addClass("body_dark");
        });
    }   
});
</script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>