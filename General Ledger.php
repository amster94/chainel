<!DOCTYPE html>
<html>
<head>
	<title>Chainel Infosystem Pvt. Ltd.|| General Ledger</title>
	<?php include 'res/header.html'; ?>
</head>

<body>
	<div class="container main_containt">
		<header><?php include 'header.php'; ?></header>
		
		<!-- containt goes here -->
		<div class="col-md-12">
			<div class="general_ledger">
				<h2><?php echo $lang['gl_h2']; ?></h2>
				<center><img class="img-responsive" src="images/products/GL_CHART.png"></center>
				<p><?php echo $lang['gl_p_1']; ?></p>
				<center><img class="img-responsive" src="images/products/aclist_2.png"></center>
				
				<h3><?php echo $lang['gl_h3_1']; ?></h3>
				<p><?php echo $lang['gl_p_2']; ?></p>
				<ul id="circle"><?php echo $lang['gl_list_1']; ?></ul>
				<p><?php echo $lang['gl_p_3']; ?></p>
				
				<h3><?php echo $lang['gl_h3_2']; ?></h3>
				<p><?php echo $lang['gl_p_4']; ?></p>
				<ol><?php echo $lang['gl_list_2']; ?></ol>
				<h4><?php echo $lang['gl_h4_1']; ?></h4>
				<ul id="tick"><?php echo $lang['gl_list_3']; ?></ul>
				<h4><?php echo $lang['gl_h4_2']; ?></h4>
				<ul id="tick"><?php echo $lang['gl_list_4']; ?></ul>
				<h4><?php echo $lang['gl_h4_3']; ?></h4>
				<p><?php echo $lang['gl_p_5']; ?></p>
				<ul id="tick"><?php echo $lang['gl_list_5']; ?></ul>
				<p><?php echo $lang['gl_p_6']; ?></p>
			</div><!-- general_ledger -->

		</div><!-- col-md-12 -->

	</div><!-- container main_containt-->
	<div class="container footer"></div>
</body>
</html>