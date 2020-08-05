<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| Master Information...</title>
<?php include 'res/header.html'; ?>
	<link rel="stylesheet" type="text/css" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script>
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
			<div class="col-md-12 patient_medical_records bottom40px">
				<h2><?php echo $lang['pmr_h2']; ?></h2>
				<p><?php echo $lang['pmr_p_1']; ?></p>
				<div class="row">
					<div class="col-md-6">
						<h3><?php echo $lang['pmr_h3_1']; ?></h3>
						<ul id="tick"><?php echo $lang['pmr_list_1']; ?></ul>
					</div>
					<!-- <div class="col-md-6 bottom40px"> -->
					<div class="col-md-5 item">
						<a href="images/products/Screen Shot 2015-12-02 at 6.01.35 PM.png" class="swipebox"  title="<?php echo $lang['master_information_for_patients']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 6.01.35 PM.png"></a>
					</div>
					<!-- </div> -->
				</div><!-- row -->
				<div class="col-md-12 item-seperator"></div>
				<div class="row ">
					<div class="col-md-6 item ">
						<a href="images/products/Screen Shot 2015-12-02 at 6.02.36 PM (1).png" class="swipebox"  title="Title"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 6.02.36 PM (1).png"></a>
						<!-- <p><center>Stock Issue Voucher</center></p> -->
					</div>					
					<div class="col-md-5 ">
						<ul id="tick"><?php echo $lang['pmr_list_2']; ?></ul>
					</div>
				</div><!-- row -->
				<div class="col-md-12 item-seperator"></div>
				<h4><?php echo $lang['screen_shots_from_module']; ?></h4>
				<div class="row card_effect ">
					<div class="col-md-4 item">
						<a href="images/products/Screen Shot 2015-12-02 at 6.03.39 PM.png" class="swipebox"  title="<?php echo $lang['uploading_medical_reports']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 6.03.39 PM.png"></a>
						<p><center><?php echo $lang['uploading_medical_reports']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Screen Shot 2015-12-02 at 6.01.50 PM.png" class="swipebox"  title="<?php echo $lang['consultation']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 6.01.50 PM.png"></a>
						<p><center><?php echo $lang['consultation']; ?></center></p>
					</div>
					<div class="col-md-4 item">
						<a href="images/products/Screen Shot 2015-12-02 at 6.01.17 PM.png" class="swipebox"  title="<?php echo $lang['doctors_and_consultation_queries_in_details']; ?>"><img class="img-responsive" src="images/products/Screen Shot 2015-12-02 at 6.01.17 PM.png"></a>
						<p><center><?php echo $lang['doctors_and_consultation_queries_in_details']; ?></center></p>
					</div>
				</div><!-- card_effect -->
			</div><!-- patient_medical_records -->

	</div><!-- container main_containt-->
	<div class="container footer"><?php include 'footer.html'; ?></div>

</body>
</html>