<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
<?php include 'res/header.html'; ?>

<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox();
});
</script>
</head>
<body>
	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		
		<!-- containt goes here -->
			<div class="col-md-12 ready_mix_mod bottom40px">
				<h2><?php echo $lang['rmm_h2']; ?></h2>
				<div class="row">
					<div class="col-md-6">
						<p><?php echo $lang['rmm_p_1']; ?></p>
					</div>
					<!-- <div class="col-md-6 bottom40px"> -->
					<div class="col-md-5 item">
						<a href="images/products/Website_readymix.png" class="swipebox"  title="Flow-Chart"><img class="img-responsive" src="images/products/Website_readymix.png"></a>
					</div>
					<!-- </div> -->
				</div><!-- row -->
				<div class="col-md-12 item-seperator"></div>
				<div class="row ">
					<div class="col-md-6 item ">
						<a href="images/products/ready_mix_mod.png" class="swipebox"  title="Title"><img class="img-responsive" src="images/products/ready_mix_mod.png"></a>
						<!-- <p><center>Stock Issue Voucher</center></p> -->
					</div>					
					<div class="col-md-5 ">
						<h4><?php echo $lang['rmm_h4_1']; ?></h4>
						<ul id="tick"><?php echo $lang['rmm_list_1']; ?></ul>
					</div>
				</div><!-- row -->
				<div class="col-md-12 item-seperator"></div>
				<div class="row ">
					<div class="col-md-6">
						<h4><?php echo $lang['rmm_h4_2']; ?></h4>
						<ul class="tick"><?php echo $lang['rmm_list_2']; ?></ul>
					</div>
					<div class="col-md-5 ">
						<div class="item">
							<a href="images/products/Screen Shot 2015-12-02 at 3.30.27 PM.png" class="swipebox"  title="Contracts"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 3.30.27 PM.png"></a>
						</div><br>
						<div class="item">
							<a href="images/products/Screen Shot 2015-12-02 at 3.31.09 PM.png" class="swipebox"  title="Contracts"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 3.31.09 PM.png"></a>
						</div>
					</div>
				</div><!-- row -->
				<div class="col-md-12 item-seperator"></div>
				<h4><?php echo $lang['screen_shots_from_module']; ?></h4>
				<div class="row card_effect ">
					<div class="col-md-4 item">
						<a href="images/products/Screen Shot 2015-11-27 at 3.01.55 PM.png" class="swipebox"  title="<?php echo $lang['recievable_ageing_report']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-11-27 at 3.01.55 PM.png"></a>
						<p><center><?php echo $lang['recievable_ageing_report']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Screen Shot 2015-11-27 at 3.03.48 PM.png" class="swipebox"  title="<?php echo $lang['daily_DNs_after_invoice']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-11-27 at 3.03.48 PM.png"></a>
						<p><center><?php echo $lang['daily_DNs_after_invoice']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Screen Shot 2015-11-27 at 3.05.33 PM.png" class="swipebox"  title="<?php echo $lang['client_screen']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-11-27 at 3.05.33 PM.png"></a>
						<p><center><?php echo $lang['client_screen']; ?></center></p>
					</div>
				</div><!-- card_effect -->
			</div><!-- ready_mix_mod -->

	</div><!-- container main_containt-->
	<div class="container footer"><?php include 'footer.html'; ?></div>

</body>
</html>