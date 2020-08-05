<!DOCTYPE html>
<html>
<head>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="table-responsive  col-md-12 approved_order_list">
			<table class="table table-bordered" >
			<caption><?php echo $lang['approved_order_list']; ?></caption>
			<thead>
				<tr class="success">
				  <th><?php echo $lang['keyfield']; ?></th>
				  <th><?php echo $lang['order_no']; ?></th>
				  <th><?php echo $lang['order_type']; ?></th>
				  <th><?php echo $lang['order_date']; ?></th>
				  <th><?php echo $lang['client_code']; ?></th>
				  <th><?php echo $lang['client_name']; ?></th>
				  <th><?php echo $lang['order_amount']; ?></th>
				  <th><?php echo $lang['order_flag']; ?></th>

				  <th><?php echo $lang['position_no']; ?></th>
				  <th><?php echo $lang['product_code']; ?></th>
				  <th><?php echo $lang['price']; ?></th>
				  <th><?php echo $lang['description']; ?></th>
				  <th>O2 <?php echo $lang['flag']; ?></th>
				</tr>
		  	</thead>

		  	<tbody id="approved_list">
		  		
		  	</tbody>
			</table>
		</div><!-- order_tables -->
	</div><!-- row -->

	<!-- <div class="col-md-8 col-md-offset-2 row"><button onclick="return Approve()" type="button" class="btn btn-success btn-lg ">Approve</button></div> -->

<br><br><br><br><br>
</div><!-- container -->
<!-- <input id="fillname" value=""/> -->
<script type="text/javascript">
// javascript code for submit form data without refresh
	var pickedup;
	$( ".approved_order_list table tr" ).on( "click", function( event ) {
 
          // get back to where it was before if it was selected :
          if (pickedup != null) {
              pickedup.css( "background-color", "#fff" );
          }
 
           // $("#fillname").val($(this).find("td").eq(0).html());
          $(this).css( "background-color", "#DDF6FC" );
 
          pickedup = $(this);
         window.pick= $(this).find("td").eq(0).html();
 			});

// $(document).ready(Approve);

</script>

<script type="text/javascript">
	
	$(document).ready(function(){
   var url = 'php/approved_order.php';
      $.getJSON(url, function(data) {
          $.each(data, function(index, data) {

$('tbody#approved_list').append('<tr><td>'  + this.keyfield+ '</td> <td>' + this.order1_no +'</td> <td>'+this.order1_type
				+ '</td> <td>'+ this.order1_date +'</td> <td>' + this.order1_client_code 
				+'</td> <td>'+ this.order1_client_name +'</td> <td>' + this.order1_amount 
				+'</td> <td>'+ this.order1_flag +

				'</td> <td>' + this.order2_pos_no +'</td> <td>'+ this.order2_prod_code +
				'</td> <td>' + this.order2_price +'</td> <td>'+ this.order2_description +
				'</td> <td>' + this.order2_flag +'</td></tr>')

// 2nd method
        //    $('#approved_list').append('<tr>');
	       // $('#approved_list').append('<td>'+data.keyfield+'</td>');
	       // $('#approved_list').append('<td>'+data.order1_no+'</td>');
	       // $('#approved_list').append('<td>'+data.order1_type+'</td>');
	       // $('#approved_list').append('<td>'+data.order1_date+'</td>');
	       // $('#approved_list').append('<td>'+data.order1_client_code+'</td>');
	       // $('#approved_list').append('<td>'+data.order1_client_name+'</td>');
	       // $('#approved_list').append('<td>'+data.order1_amount+'</td>');
	       // $('#approved_list').append('<td>'+data.order1_flag+'</td>');

	       // $('#approved_list').append('<td>'+data.order2_pos_no+'</td>');
	       // $('#approved_list').append('<td>'+data.order2_prod_code+'</td>');
	       // $('#approved_list').append('<td>'+data.order2_price+'</td>');
	       // $('#approved_list').append('<td>'+data.order2_description+'</td>');
	       // $('#approved_list').append('<td>'+data.order2_flag+'</td>');
	       // $('#approved_list').append('</tr>');
    });
 
   });
});
              
</script>

<div id="msgo3"></div>
<!-- <div id="msgo3s"></div> -->

</body>
</html>