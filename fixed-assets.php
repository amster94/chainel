<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Fixed-Assets</title>
<?php include 'res/header.html'; ?>
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox2").swipebox();
});
</script>
</head>

<body>
	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		
		<!-- containt goes here -->
		<div class="col-md-12">
			<div class="fixed_assets">
				<h2><?php echo $lang['fixed-asset_h2']; ?></h2>
				<h3><?php echo $lang['fixed-asset_h3_1']; ?></h3>
				<div class="row">
					<div class="col-md-6">
						<ul id="tick"><?php echo $lang['fixed-asset_list_1']; ?></ul>
					</div>
					<!-- <div class="col-md-6 bottom40px"> -->
					  <div class="col-md-5 item">
						<a href="images/products/Screen Shot 2015-12-02 at 4.06.44 PM.png" class="swipebox2"  title="<?php echo $lang['fixed_assets_items_card']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 4.06.44 PM.png"></a>
						<!-- <p><center>Stock Issue Voucher</center></p> -->
					  </div>
					<!-- </div> -->
				</div>
				<div class="col-md-12 item-seperator"></div>
				<div class="row bottom40px">
					<div class="col-md-6 item ">
						<a href="images/products/Screen Shot 2015-12-02 at 4.50.28 PM.png" class="swipebox2"  title="<?php echo $lang['periodic_fixed_assets_value']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 4.50.28 PM.png"></a>
						<!-- <p><center>Stock Issue Voucher</center></p> -->
					</div>					
					<div class="col-md-5 ">
						<h4><?php echo $lang['fixed-asset_h4_1']; ?></h4>
						<ul id="tick"><?php echo $lang['fixed-asset_list_2']; ?></ul>
					</div>
				</div><!-- row -->
			</div><!-- fixed_assets -->

		</div><!-- col-md-12 -->

	</div><!-- container main_containt-->
	<div class="container footer"><?php include 'footer.html'; ?></div>

</body>
</html>