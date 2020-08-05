<!DOCTYPE html>
<html>
<head>
<!-- <title>Chainel Infosystem Pvt. Ltd.</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/angular.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 -->
 
<!-- Inserting data into client table -->
<?php
ini_set('display_errors',0);
?>

<script type="text/javascript">
// <!--js for live search for Product form-->
$(document).ready(function() {
	$('#productkey').on('input', function() {
		var searchKeyword = $(this).val();
		if (searchKeyword.length >= 1) {
			$.post('php/search.php', { productkey: searchKeyword }, function(data) {
          	$('tbody#pcontent').empty()
          // $('tr#content2').empty()
          $.each(data, function() {

          	 //$('tbody#pcontent').append('<tr><td><a href="index.php?id=' + this.id + '">' + this.id + '</td> <td>' + this.title + '</td></tr>');
            
            $('tbody#pcontent').append('<tr> <td data-dismiss="modal"> <a class=""  type="button" onclick="editFunctionForProducts(\''+this.id+'\' )">'+this.id+''+'</a></td> <td>'  + this.id + '</td> <td>' + this.title + '</td></tr>')
          	
            // $('td#content2').append(this.title);
            
          });
        }, "json");
		}
	});
});

function editFunctionForProducts(id) {
	// document.getElementById('test1').innerHTML=id;
	window.prim_id=id;
	var dataString = 'product_code='+ id;
		$.ajax({
			type:"POST",
			url:"php/fill_products_form.php",
			data:dataString,
			cache:true,
			success:function(response) {
			$( "#product_code" ).prop( "readOnly", true );
			var result = $.parseJSON(response);//parse JSON
			// alert(response);
			$.each(result, function(key, value){
			    $.each(value, function(key, value){
			        // console.log(key, value);
			        $('#'+key).val(value);

			    });
			});
			}
		});

}
</script>

</head>

<body>
<div class="container">
<!-- <div id='msgp'></div> -->
<!-- Product form begin here -->
	<div class="col-md-offset-2 product_form row">
		<center><h3><?php echo $lang['product_form']; ?></h3></center>
		<form  action="" method="POST" name="product_form" id="products_form">
		<div class="form-group row">
			<label for="product_code" class="col-md-2"><?php echo $lang['product_code'] ?></label>
			<div class="col-md-4" >
				<input  type="text" class="form-control" name="product_code" id="product_code" autocomplete="off" required>
			</div>	
			<label for="product_description" class="col-md-2"><?php echo $lang['product_name'] ?></label>
			<div class="col-md-4">
				<input type="text" class="form-control"  name="product_description" id="product_description" required>
				<!-- <input type="text" class="form-control" name="Product_name" id="Product_name"  autocomplete="off" required> -->
			</div>	
		</div><!-- form-group -->

		<div class="form-group row">
			<label for="product_price" class="col-md-2"><?php echo $lang['product_price']; ?></label>
			<div class="col-md-4" >
				<input  type="number" class="form-control" name="product_price" id="product_price" autocomplete="off" required>
			</div>	
			<label for="product_ctg_code" class="col-md-2"><?php echo $lang['product_category']; ?></label>
			<div class="col-md-4">
				<select class="form-control" name="product_ctg_code" id="product_ctg_code" required>
					<option value="Not Selected">--<?php echo $lang['product_category_code']; ?>--</option>
				</select>
			</div>
		</div><!-- form-group -->
		
		<div class="form-group row">
			<label for="product_flag" class="col-md-2"><?php echo $lang['product_flag']; ?></label>
			<div class="col-md-4" >
				<input  type="text" class="form-control" name="product_flag" id="product_flag" autocomplete="off" required>
			</div>	
		</div><!-- form-group -->
		<div class="form-group row ">
		<label for="bt" class="col-md-2"> </label>
			<div class="col-md-7">
				<input onclick="return saveFormData('#products_form',window.prim_id)"  type="submit" class="btn btn-success  btn-lg custom_btn" name="l_save" value="<?php echo $lang['save'] ?>">
				<!-- <input onclick="return updateFormData('#products_form',window.prim_id)"  type="submit" class="btn btn-success  btn-lg " name="l_update" value="Update"> -->
				<input type="reset" class="btn btn-info  btn-lg custom_btn" name="l_clear" value="<?php echo $lang['clear'] ?>">
				<button type="button" class="btn btn-info btn-lg custom_btn" data-toggle="modal" data-target="#productModal"><?php echo $lang['list'] ?></button>
			</div>
		</div><!-- form-group -->
		</form>
		
	</div><!-- product_form -->
<!--product_form Modal -->
<div id="productModal" class="modal fade " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body ">
      <form action="" method="POST">
        <div class="form-group row">
			<label for="productkey" class="col-md-2"><?php echo $lang['filter']; ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="filter" id="productkey" required>
			</div>
			
			<!-- <div class="col-md-3">
				<input type="submit" class="btn btn-success btn-md" name="" value="Filter">
			</div> -->
		</div><!-- form-group -->
	  </form>	
	 	<div class="table-responsive modal_fixed_height">
		      <table class="table  table-striped table-bordered table-hover">
		      <tr class="success">
		        <th><?php echo $lang['edit']; ?></th>
		        <th><?php echo $lang['product_code']; ?></th>
		        <th><?php echo $lang['product_name']; ?></th>
		      </tr>
		      <tbody id="pcontent" class="scroll">
			  </tbody>
		     </table>
		</div><!-- table-responsive -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang['close']; ?></button>
      </div>
    </div><!-- modal-content -->
    
  </div><!-- modal-dialog -->
</div><!-- 	modal fade -->	
<!-- Product form end here -->
</div><!-- container --><br><br><br><br><br>
<script type="text/javascript">
// Script for fetching Product Category form 
$(document).ready(function(){
   var url = 'php/option_product.php';
      $.getJSON(url, function(data) {
          $.each(data, function(index, data) {

	$('select#product_ctg_code').append("<option value=" + data.product_ctg_code +">"+data.product_ctg_title+"</option>");
	// alert(data);

    });
 
   });
});
              
</script>
</body>
</html>