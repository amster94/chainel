<!DOCTYPE html>
<html>
<head>
<title>Chainel Infosystem Pvt. Ltd.</title>
<?php 
include 'res/header.html';
// session_start();
?>
<link href="css/jquery.loader.css" rel="stylesheet">

<script src="js/jquery.loader.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		$('#loader_container').hide();
		window.added= [];
		var i=1;
		var total=0;
		$('.g_ttl').hide();

		$( "tbody#order_data tr" ).on("click", function( event ) {
			var key =$(this).find("td").eq(0).html();

			var tobe_added =$(this).find("td").eq(0).html();
			
			var dataString = 'product_code='+ key;
			$.ajax({
				type:"POST",
				url:"php/fill_products_form.php",
				data:dataString,
				cache:false,
				success:function(response) {
				// $( "#client_code" ).prop("readOnly", true);
				if (jQuery.inArray(tobe_added, added) < 0) {
					// added=[];
					console.log(' diff. data');
					var json_obj = $.parseJSON(response);
					var l = $('#order_list tr').length;

					$('.g_ttl').show();
					var data="<tr><td class='pointer red' onclick='Remove(this.id)' id='remove"+i+"'>X</td><td id='sl_no"+i+"'>"+i+"</td>";
					data +="<td id='product_code"+i+"'>"+json_obj[0].product_code+"</td><td id='product_description"+i+"'>"+json_obj[0].product_description+"</td><td id='qty"+i+"' onkeyup='changeQty(this.id)' contenteditable='true'>2</td><td id='product_price"+i+"'>"+json_obj[0].product_price+"</td><td class='total' id='total"+i+"'></td></tr>";
					$('#order_list').append(data);
					$("#qty"+i).text(1);
					var x=$("#qty"+i).text();
					var y=$("#product_price"+i).html();
					var z=parseInt(x)*parseInt(y);							
					$("#total"+i).html(z);
					total=total+z;
					$(".gross_total").html(total);
					i++;

					// var added= [];
					$('#order_list tr').each(function() {
				        added.push($(this).find("td").eq(2).text());
				       console.log(added);
				    });
				    
					grossTotal();
					reOrderSlNo();
				}else{
					// var key =$('tbody#order_list tr').find("td").eq(4).text('2');
					console.log(key+' same data');
					alert('This product is already added Choose different!');
				}	
				}
				
			});
		});	
	});

	function grossTotal(){   
	    var total=0;
	  	$(".total").each(function(){
	  		total = total+ parseInt($(this).text());
	    });
	    $(".gross_total").text(total);
	   // total=0;
	}
	function changeQty(id){
		
	    id = id.slice(3, 5);
	    var qty=$("#qty"+id).text();
	   // alert(qty);
	    var q=qty;
	    var r=$("#product_price"+id).text();
	    var a=q*r;
	    // console.log(q);
	    $("#total"+id).html(a);
	    grossTotal();
	}
	function Remove(id){
		// var temp=$('#'+id).parents("tr");
		var remove =$('#'+id).parents("tr").find("td").eq(2).html();
		added= jQuery.grep(added, function(value) {
		  return value != remove;
		});
		// alert(added);

		$('#'+id).parents("tr").remove();

		reOrderSlNo();
		grossTotal();
	}
	function reOrderSlNo(){
		var i = 1;
	   	$('#order_list tr').each(function() {
	        $(this).find("td").eq(1).text(i);
	        i++;
	    });
	}
	function compareDuplicate(key){
		// console.log(key);
		var added= [];
	   	$('#order_list tr').each(function() {
	        added.push($(this).find("td").eq(2).text());
	       // if (jQuery.inArray(key, added) < 0) {
	    	// console.log('diff. data');
	    	// }else{console.log('same data');}
	    });
	    // console.log(added);
	}
</script>

</head>
<body>
<div class="container main_containt">
<header><?php include 'header.php'; ?></header>
<div class="col-md-3 row">
<?php include 'user_menu.php'; ?>
</div><!-- col-md-3 -->
	<!-- <h3 class="text_shadow pull-left">Change Password</h3> -->
	<div class="order_form col-md-8">
		<form action="" method="POST" id="order_form">
		<div id="loader_container"><p id="loader">Wait...</p></div>
			<div class="form-group row">
				<div class="col-md-6">
					<label for="order_no"><?php echo $lang['order_no']; ?></label>
					<?php 
						include 'php/connect_pdo.php';
				      	$result=$db->prepare("SELECT MAX(order1_no) as maximum FROM order1");
				      	$result->execute();
				      	foreach ($result->fetchAll() as $row) {?>
				    <input value="<?php echo $row['maximum']+1; ?>" type="number" class="form-control" name="order_no" id="order_no" readOnly>
					<?php } ?>
				    <!-- <input value="sdfsdf" type="number" class="form-control" name="order_no" id="order_no" autocomplete="off" readOnly> -->

				</div>
				<div class="col-md-6">
					<label for="order_date"><?php echo $lang['date']; ?></label>
					<input value="<?php echo date('d/m/Y'); ?>" type="text" class="form-control" name="order_date" id="order_date" readonly="" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group ">
				<label for="remarks"><?php echo $lang['remarks']; ?></label>
				<input type="text" class="form-control" name="remarks" id="remarks" autocomplete="off" required>
			</div>
			
			<div class="table-responsive modal_fixed_height order_data">
			      <table id="otable" class=" table  table-striped table-bordered table-hover">
				      <thead>
				      	<tr  class="success">
    					<!-- <th><input class='check_all' type='checkbox' onclick="select_all()"/></th> -->
				        <th>#</th>
				        <th><?php echo $lang['sl_no']; ?></th>
				        <th><?php echo $lang['product_code']; ?></th>
				        <th><?php echo $lang['product_name']; ?></th>
				        <th><?php echo $lang['qty']; ?></th>
				        <th><?php echo $lang['price']; ?></th>
				        <th><?php echo $lang['amount']; ?></th>
				      </tr>
				      </thead>
				      
				      <tbody id="order_list" class="scroll">
					  </tbody>					  
			     </table>
			     <div class="g_ttl pull-right"><h3 class="gross_total">xxx</h3></div>
			</div><!-- table-responsive -->
			<div class="form-group">
				<input type="button" data-toggle="modal" data-target="#orderModal" class="btn btn-success  btn-lg custom_btn" name="add_product" value="<?php echo $lang['add_products']; ?>" >
				<!-- <input onclick="compareDuplicate()" type="button" class='btn btn-lg btn-success custom_btn' value="Check"> -->
				<input onclick="saveOrder()" type="button" class="btn btn-lg btn-success custom_btn" name="save" value="<?php echo $lang['save']; ?>" >
				<input onclick="clearData()" type="button" class="btn btn-lg btn-success custom_btn" name="clear" value="<?php echo $lang['clear']; ?>" >
			</div>
		</form>
		
	</div><!-- order_form col-md-8-->

<div id="orderModal" class="modal fade " role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $lang['select_products_from_list']; ?></h4>
      </div>
      <div class="modal-body">
	      <div class="select_product col-md-12 ">
			<form action="" method="POST">
		    	<div class="form-group row">
					<div class="col-md-6">
						<!-- <label for="order_key" class="">Filter:</label> -->
						<!-- <input type="text" class="form-control" name="filter" id="order_key" required> -->
						<input type="search" id="order_key" class="light-table-filter form-control" data-table="filter-table" placeholder="Filter">
					</div>
				</div><!-- form-group -->
	  		</form>
			<div class="table-responsive modal_fixed_height  ">
				<table class="filter-table table  table-striped table-bordered table-hover">
				      <!-- <caption>Select product:</caption> -->
			      <thead>
			      	<tr class="success">
				        <th><?php echo $lang['product_code']; ?></th>
				        <th><?php echo $lang['product_name']; ?></th>
			      	</tr>
			      </thead>				      
			      <tbody id="order_data" class="scroll pointer">
			      	<?php 
			      	include 'php/connect_pdo.php';
			      	$result=$db->prepare("SELECT * FROM products");
			      	$result->execute();
			      	foreach ($result->fetchAll() as $row ) {?>
			      		<tr >
			      			<td onclick="double(this.id)" id="<?php echo $row['prod_code']; ?>"><?php echo $row['prod_code']; ?></td>
			      			<td><?php echo $row['prod_descr']; ?></td>
			      		</tr>
			      	<?php } ?>
			      </tbody>
				</table>
			</div><!-- table-responsive -->
		  </div><!-- col-md-12 -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang['close']; ?></button>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- 	modal fade -->
</div><!-- container -->
<div class="container footer"></div>
<script>
function saveOrder(){
	var remarks= $('#remarks').val();
	var order_no= $('#order_no').val();
	var gross_total= $('#gross_total').text();
	// var names1 = [].map.call($("#otable thead th"), function (th) {
	//     return $(th).text();
	// });
	var order_data=['action','sl_no','product_code','product_name','qty','price','amount'];
	var x = [].map.call($("#otable tbody tr"), function (tr) {
	    return [].reduce.call(tr.cells, function (p, td, i) {
	        p[order_data[i]] = $(td).text();
	        return p;
	    }, {});
	});

	var dataSet = JSON.stringify(x);
	$.ajax({
		type:"POST",
		url:"php/save_order_data.php",
		data: { tableArray: dataSet, remarks: remarks, order_no: order_no, gross_total: gross_total},
		// data:dataSet,
		cache:true,
		beforeSend:function(){
			$('#loader_container').show();
			$('#loader').addClass('loader');
			$('body').addClass('body');
		},
		success:function(html) {
			setTimeout(function() {
			   $('#loader').removeClass('loader');
			   $('body').removeClass('body');
			   $('#loader_container').hide();
			   alert(html);
				// console.log(html); 
			}, 2000);
		
		}
	});
	return false;
}
function clearData(){
	$('#remarks').val('');
	$('.gross_total').html('0');
	$("#otable > tbody").html("");
	added=[];
}
</script>
<script type="text/javascript">
function double(id){
	// alert(id);
  
      $btn = $('#'+id); //Or which ever you want
      //Change the label of $btn
      // $btn.val($btn.val()+' ('+count+')')
   var count = 1;   
  $('#'+id).click(function(){
      // $btn.val($btn.val().replace(count,count+1));
     count++;
     console.log(id+' '+count);
     $('#print').val(count);
      if(count==2) {
      	// console.log('bye');
            // return !$btn.attr('disabled','disabled');
      }
        
  });
}
</script>
</body>
</html>