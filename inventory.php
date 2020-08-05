<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
	<?php include 'res/header.html'; ?>
</head>
<!-- <script src="js/jquery.swipebox.min.js"></script>  -->
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox();
});
</script>

<body>
	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		
		<!-- containt goes here -->
		<div class="col-md-12 inventory bottom40px">
				<center><img class="img-responsive" src="images/products/ITEMCARD.png"></center>
				<h2><?php echo $lang['inventory_h2']; ?></h2>
				<ul id="tick"><?php echo $lang['inventory_list_1']; ?></ul>
				
				<h4><u><?php echo $lang['inventory_h4_1']; ?></u></h4>
				<ul><?php echo $lang['inventory_list_2']; ?></ul>
				
				<h4><u><?php echo $lang['inventory_h4_2']; ?></u></h4>
				<ul><?php echo $lang['inventory_list_3']; ?></ul>

				<h4><u><?php echo $lang['inventory_h4_3']; ?></u></h4>
				<ul><?php echo $lang['inventory_list_4']; ?></ul>

				<h4><u><?php echo $lang['inventory_h4_4']; ?></u></h4>
				<ul id="star"><?php echo $lang['inventory_list_5']; ?></ul>

				<table class="table table-bordered well">
					<thead><?php echo $lang['inventory_tb_thead_1']; ?></thead>
					<tbody><?php echo $lang['inventory_tb_tbody_1']; ?></tbody>
				</table>

				<h4><?php echo $lang['screen_shots_from_module']; ?></h4>
				<div class="row card_effect ">
					<div class="col-md-4 item">
						<a href="images/products/Sales Invoice.png" class="swipebox"  title="<?php echo $lang['sales_invoice']; ?>"><img class="img-responsive" src="images/products/Sales Invoice.png"></a>
						<p><center><?php echo $lang['sales_invoice']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Stock Issue Voucher.png" class="swipebox"  title="<?php echo $lang['stock_issue_voucher']; ?>"><img class="img-responsive" src="images/products/Stock Issue Voucher.png"></a>
						<p><center><?php echo $lang['stock_issue_voucher']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Stock aging Report.png" class="swipebox"  title="<?php echo $lang['stock_aging_report']; ?>"><img class="img-responsive" src="images/products/Stock aging Report.png"></a>
						<p><center><?php echo $lang['stock_aging_report']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/STOCK TRANSACTION SUMMARY.png" class="swipebox"  title="<?php echo $lang['stock_transaction_summary']; ?>"><img class="img-responsive" src="images/products/STOCK TRANSACTION SUMMARY.png"></a>
						<p><center><?php echo $lang['stock_transaction_summary']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Stock card with Costing.png" class="swipebox"  title="<?php echo $lang['stock_card_with_costing']; ?>"><img class="img-responsive" src="images/products/Stock card with Costing.png"></a>
						<p><center><?php echo $lang['stock_card_with_costing']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Items browser.png" class="swipebox"  title="<?php echo $lang['items_browser']; ?>"><img class="img-responsive" src="images/products/Items browser.png"></a>
						<p><center><?php echo $lang['items_browser']; ?></center></p>
					</div>
				</div><!-- card_effect -->

		</div><!-- col-md-12 inventory bottom40px-->
	</div><!-- container main_containt-->
	<div class="container footer"><?php include 'footer.html'; ?></div>
</body>
</html>