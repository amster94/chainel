<!DOCTYPE html>
<html>
<head>
<!-- <title>Chainel Infosystem Pvt. Ltd.</title>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/angular.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
 -->
<script type="text/javascript">
// <!--js for live search for product_ctg_ form-->
$(document).ready(function() {
	$('#product_ctg_key').on('input', function() {
		var searchKeyword = $(this).val();
		if (searchKeyword.length >= 1) {
			$.post('php/search.php', { product_ctg_key: searchKeyword }, function(data) {
          	$('tbody#pctgcontent').empty()
          // $('tr#content2').empty()
          $.each(data, function() {

            $('tbody#pctgcontent').append('<tr> <td data-dismiss="modal"> <a class=""  type="button" onclick="editFunctionForPrdCtg(\''+this.id+'\')">'+this.id+''+'</a></td> <td>'  + this.id + '</td> <td>' + this.title + '</td></tr>')
            
          });
        }, "json");
		}
	});
});

function editFunctionForPrdCtg (id) {
	// alert(form_id);
	window.prim_id=id;
	var dataString = 'products_ctg_code='+ id;

		$.ajax({
			type:"POST",
			url:"php/fill_product_ctg_form.php",
			data:dataString,
			cache:true,
			
			success:function(response) {
			$( "#products_ctg_code" ).prop( "readOnly", true );
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
<!-- <p id='msg'></p> -->
<!-- product_ctg_ form begin here -->
	<div class="col-md-offset-2 product_ctg__form row">
		<center><h3><?php echo $lang['product_category_form']; ?></h3></center>
		<form  action="" method="POST" name="product_category_form" id="product_ctg">
		<div class="form-group row">
			<label for="products_ctg_code" class="col-md-3"><?php echo $lang['product_category_code']; ?></label>
			<div class="col-md-6" >
				<input  type="text" class="form-control" name="products_ctg_code" id="products_ctg_code" autocomplete="off" required>
			</div>
		</div><!-- form-group-->
		<div class="form-group row">		
			<label for="products_ctg_title" class="col-md-3"><?php echo $lang['product_category_name']; ?></label>
			<div class="col-md-6" >
				<input  type="text" class="form-control" name="products_ctg_title" id="products_ctg_title" autocomplete="off" required>
			</div>
		</div><!-- form-group-->
		<div class="form-group row ">
		<label for="bt" class="col-md-2"> </label>
			<div class="col-md-7">
				<input onclick="return saveFormData('#product_ctg',window.prim_id)" type="submit" class="btn btn-success  btn-lg custom_btn" name="l_save" value="<?php echo $lang['save']; ?>">
				<!-- <input onclick="return updateFormData('#product_ctg',window.prim_id)" type="submit" class="btn btn-success  btn-lg " name="l_update" value="Update"> -->
				<input type="reset" class="btn btn-info  btn-lg custom_btn" name="l_clear" value="<?php echo $lang['clear']; ?>">
				<input type="button" class="btn btn-info btn-lg custom_btn" data-toggle="modal" data-target="#product_ctg_Modal" value="<?php echo $lang['list']; ?>">
			</div>
		</div><!-- form-group -->
		</form>
		
	</div><!-- product_ctg__form -->
<!--product_ctg__form Modal -->
<div id="product_ctg_Modal" class="modal fade " role="dialog">
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
			<label for="product_ctg_key" class="col-md-2"><?php echo $lang['filter']; ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="filter" id="product_ctg_key" required>
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
		        <th><?php echo $lang['product_category_code']; ?></th>
		        <th><?php echo $lang['product_category_name']; ?></th>
		      </tr>
		      <tbody id="pctgcontent" class="scroll">
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
<!-- product_ctg_ form end here -->


</div><!-- container --><br><br><br><br><br>

</body>
</html>