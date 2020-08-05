<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
	<?php include 'res/header.html'; ?>

<script type="text/javascript">
jQuery(function($) {
	$(".swipebox1").swipebox();
});
</script>
</head>

<body>
	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		
		<!-- containt goes here -->
		<div class="col-md-12">
			<div class="purchase bottom40px">
				<h2><?php echo $lang['purchase_h2']; ?></h2>
				<center><img class="img-responsive" src="images/products/purchase management flowchart.png"></center>
				<br><br><div class="row">
					<div class="col-md-6">
						<ul id="tick"><?php echo $lang['purchase_list_1']; ?></ul>
					</div>
					<div class="col-md-5 item">
						<a href="images/products/Screen Shot 2015-12-22 at 1.35.14 PM.png" class="swipebox1"  title="##"><img class="img-responsive" src="images/products/Screen Shot 2015-12-22 at 1.35.14 PM.png"></a>
						<!-- <p><center>Stock Issue Voucher</center></p> -->
					</div>
				</div>
			</div><!-- purchase -->

		</div><!-- col-md-12 -->

	</div><!-- container main_containt-->
	<div class="container footer"><?php include 'footer.html'; ?></div>

</body>
</html>