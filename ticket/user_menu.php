<link rel="stylesheet" href="css/custom.css" />
<!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->

 <div id='wrapper_user'>
<!-- Sidebar -->
        <div id="sidebar-wrapper_user">

            <ul class="sidebar-nav_user">
              <!-- <h3 class="sidebar-brand_user"><center>Admin Panel</center></h3> -->
                <!-- <li><a href="#"></a> </li> -->
               <h3 class="sidebar-brand_user"><?php echo $lang['user_information']; ?></h3>
               <li id="edit_client_profile"><a href='../edit_profile'><?php echo $lang['edit_user_profile']; ?></a></li>
               <li id="user_password"><a href='../change_pwd'><?php echo $lang['change_password']; ?></a></li>
               <li id="order"><a href='../order'><?php echo $lang['order']; ?></a></li>
               <li id="store"><a href='#'><?php echo $lang['store']; ?></a></li>
               <li id="tickets"><a href='../ticket'><?php echo $lang['tickets']; ?></a></li>
               <li id="appointment"><a href='../appointment'><?php echo $lang['appointment'] ?></a></li>
               <!-- <li id="tickets"><a href='../../ticket_status'>Ticket Status</a></li> -->
            </ul>
        </div>
</div>

<script>
$(document).ready(function(){
   // $("sidebar-nav_user li:first").addClass("active");
    // $("li").click(function(){
    //   $("li").removeClass("active");
    //     $(this).addClass("active");
    // });
});
</script>
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper_user").toggleClass("toggled");
    // $("body").addClass("body_dark");
});

$(window).ready(function(){
    if ($(window).width() <= 900){  
        $("#sidebar-wrapper_user ul li").click(function(e) {
            // e.preventDefault();
            $("#wrapper_user").toggleClass("toggled");
            // $("body").addClass("body_dark");
        });
    }   
});
</script>