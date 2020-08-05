<div class="panel panel-primary">
	<div class="panel-heading"><center><b>News & Events</center></div>
		<div class="panel-body">
			<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="3">
			<ul class="style_type">

				<?php 
				require_once '../php/connect_pdo.php';
				$result=$db->prepare("SELECT * FROM news");
				$result->execute();
				foreach ($result->fetchAll() as $row) {?>
				<li><?php echo $row['news']; ?></li>
				<?php } ?>
			</ul>
			</marquee>
		</div><!-- panel-body -->
</div><!-- panel panel-primary -->
<style type="text/css">
	.style_type{
		list-style: none;
	}
</style>