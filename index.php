<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
	<?php include 'res/header.html';?>

<script type="text/javascript">
$(document).ready(function(){ 
	$('.news').load('news/news.php');

});
</script>
<!-- Facebook page pluging js-->
<!-- <div id="fb-root"></div> -->
<script>
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- Facebook page pluging -->
</head>
<body>
	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		<div class="outer_carousel">
			<div class="carousel slide home_slider" data-ride="carousel" id="featured">
			 <ol class="carousel-indicators"></ol> 
			 <ol class="carousel-indicators ">
				<li data-target="#featured" data-slide-to="0" class="active"></li>
				<li data-target="#featured" data-slide-to="1"></li>
				<li data-target="#featured" data-slide-to="2"></li>
				<li data-target="#featured" data-slide-to="3"></li>
				<li data-target="#featured" data-slide-to="4"></li>
				<li data-target="#featured" data-slide-to="5"></li>
			</ol>
				<div class="carousel-inner">
					<div class="item active"><img src="images/slider/inventory.jpg" alt=""><div class="col-md-4  image_title"><h3>Inventory/Warehouse</h3></div></div>

					<div class="item"><img src="images/slider/double_book_keeping.jpg" alt=""><div class="col-md-4  image_title"><h3>Special module for concrete ready mixtures companies..</h3></div></div>

					<div class="item"><img src="images/slider/pos.jpg" alt=""><div class="col-md-4 image_title"><h3>POS system is smart way to sell</h3></div></div>

					<div class="item"><img src="images/slider/purchase.jpg" alt=""><div class="col-md-4 image_title"><h3>No matter how large is your consignment with easy web based purchase management.</h3></div></div>

					<div class="item"><img src="images/slider/readymix.jpg" alt=""><div class="col-md-4 image_title"><h3>Customized  module developed for concrete ready mixture industries..</h3></div></div>
					
					<div class="item"><img src="images/slider/sales.jpg" alt=""><div class="col-md-4 image_title"><h3>Sale..</h3></div></div>
			   	</div>
				  <a class="left carousel-control" href="#featured" roll="button" data-slide="prev">
				  	<span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#featured" roll="button" data-slide="next">
				  	<span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
			</div> 
		</div>

		<!-- containt goes here -->
		<div class="col-md-8 about_us">
				<h3><?php echo $lang['home_h3']; ?></h3>
				<h4><?php echo $lang['home_h4_1']; ?></h4>
				<p><?php echo $lang['home_p_1']; ?></p>
				<p><?php echo $lang['home_p_2']; ?></p>

				<h4><?php echo $lang['home_h4_2']; ?></h4>
				<p><?php echo $lang['home_p_3']; ?></p>
				<ul><?php echo $lang['home_list_1']; ?></ul>

				<h4><?php echo $lang['home_h4_3']; ?></h4>
				<ul><?php echo $lang['home_list_2']; ?></ul>

				<h4><?php echo $lang['home_h4_4']; ?></h4>
				<ul><?php echo $lang['home_list_3']; ?></ul>

				<h4><?php echo $lang['home_h4_5']; ?></h4>
				<p><?php echo $lang['home_p_4']; ?></p>

				<h4><?php echo $lang['home_h4_6']; ?></h4>
				<p><?php echo $lang['home_p_5']; ?></p>

				<h4><?php echo $lang['home_h4_7']; ?></h4>
				<p><?php echo $lang['home_p_6']; ?></p>
				<ul><?php echo $lang['home_list_4']; ?></ul>

				<h4><?php echo $lang['home_h4_8']; ?></h4>
				<ul><?php echo $lang['home_list_5']; ?></ul>
		</div><!-- col-md-8 -->
<br><br>
		<div class="col-md-4 bx_border">
			<div class="fb-page row" data-href="https://www.facebook.com/pages/Chainel/104961249857750?fref=ts" data-height="490" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Chainel/104961249857750?fref=ts"><a href="https://www.facebook.com/pages/Chainel/104961249857750?fref=ts">Chainel</a></blockquote></div></div>
			<div class="row news"></div>
		</div><!-- col-md-4 -->
	</div><!-- container main_containt-->
	<div class="container footer"></div>
</body>
</html>
