<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
	<?php include 'res/header.html'; ?>
</head>

<body>
	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		
		<!-- containt goes here -->
		<div class="col-md-12">
			<div class="sales">
				<h2><?php echo $lang['sales_h2']; ?></h2>
				<p><?php echo $lang['sales_p_1']; ?></p>
				<p><?php echo $lang['sales_p_2']; ?></p>
				<div class="row">
					<div class="col-md-6">
						<ul id="tick"><?php echo $lang['sales_list_1']; ?></ul>
					</div>
					<div class="col-md-5">
						<img class="img-responsive" src="images/products/Sales Invoice.png">
					</div>
				</div>
			</div><!-- sales -->

		</div><!-- col-md-12 -->

	</div><!-- container main_containt-->
	<div class="container footer"><?php include 'footer.html'; ?></div>
</body>
</html>