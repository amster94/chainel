<!-- <link rel="stylesheet" type="text/css" href="news/css/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="news/css/news.css">
<div class="container news_outer">
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="add_news">
    <h4 class="panel-title">News & Events</h4>
    <p class="pull-right ">News id: <span id="news_id">XX</span></p>
    <!-- <p id="news_title"></p> -->
  </div>
  <div class="panel-body ">
    <form class="news_form" method="post">
      <div class="form-group row">
      
        <div class="col-md-12">
          <label for="news_title" class="">Enter New News:</label>
          <input type="text" class="form-control" name="news_title" id="news_title" autocomplete="off" required>
        </div>
      </div><!-- form-group row -->
      <!-- <label for="bt" class="col-md-3"> </label> -->
      <div class="col-md-12">
          <button onclick="saveUpdateNews()" type="button" class='save custom_btn'>Save</button>
          <button onclick="deleteNews()" type="button" class='delete_news custom_btn'>- Delete</button>
          <button  type="reset" class='reset custom_btn'>Clear</button>
          <button type="button" class='custom_btn' data-toggle="modal" data-target="#newsModal">News List</button>
      </div>
     </form>
  </div><!-- panel-body -->
</div><!-- panel panel-default -->
<!-- Code for news list modal -->
<div id="newsModal" class="modal fade " role="dialog">
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
        <label for="newskey" class="col-md-2">Filter:</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="newskey" id="newskey" required>
        </div>
        
        <!-- <div class="col-md-3">
          <input type="submit" class="btn btn-success btn-md" name="" value="Filter">
        </div> -->
      </div><!-- form-group -->
    </form> 
    <div class="table-responsive modal_fixed_height">
          <table class="table  table-striped table-bordered table-hover">
          <tr class="success">
            <th>News Id</th>
            <th>News</th>
          </tr>
          <tbody id="newscontent" class="scroll">
        </tbody>
         </table>
    </div><!-- table-responsive -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- modal-content -->
    
  </div><!-- modal-dialog -->
</div><!--  modal fade -->  
</div><!-- container -->
<script type="text/javascript">
// <!--js for live search for location form-->
$(document).ready(function() {
  $('#newskey').on('input', function() {
    var searchKeyword = $(this).val();
    if (searchKeyword.length >= 1) {
      $.post('php/search.php', { newskey: searchKeyword }, function(data) {
            $('tbody#newscontent').empty()
          
          $.each(data, function() {

             //$('tbody#lcontent').append('<tr><td><a href="index.php?id=' + this.id + '">' + this.id + '</td> <td>' + this.title + '</td></tr>');
            
            $('tbody#newscontent').append('<tr class="pointer" onclick="editFunctionForNews(\''+this.id+'\' )" data-dismiss="modal"><td>'+this.id+'</td><td>' + this.title + '</td></tr>')
            
            // $('td#content2').append(this.title);
            
          });
        }, "json");
    }
  });
});

function editFunctionForNews(id) {
  // document.getElementById('test1').innerHTML=id;
  // window.prim_id=id;
  
  var dataString = 'news_id='+ id;
  // alert(dataString);
    $.ajax({
      type:"POST",
      url:"news/php_script/fill_news_form.php",
      data:dataString,
      cache:false,
      success:function(response) {
// document.getElementById('test1').innerHTML=response;
      // $( "#location_codeCHID" ).prop( "readOnly", true );
      var result = $.parseJSON(response);//parse JSON
      // alert(response);
      $.each(result, function(key, value){
          $.each(value, function(key, value){
              console.log(key, value);
              $('#news_title').val(value);
              $('#'+key).html(value);
              // $('#'+key).val(value);
              // console.log($('#news_id').html(value););
          });
      });
      
      }
    });

}
</script>
<script type="text/javascript">
  function saveUpdateNews(){
    var form_id=form_id;
    var news_id =$('#news_id').html();
    var news=$('#news_title').val();
    // alert(news);
    var dataString = 'news_id='+news_id+'&news='+news;
    console.log(dataString);
    $.ajax({
      type:"POST",
      url:"news/php_script/save_update.php",
      data:dataString,
      cache:true,
      success:function(html) {
      // $( "*" ).prop("readOnly", true);
      // $("[id$=CHID]").prop("readOnly", true);
      // $("input[type=text],input[type=email],input[type=number],input[type=password],input[type=radio],select, textarea").val("");
        alert(html);
        // $('#msg').html(html);  
      }
    });
    return false;
}
function deleteNews(){
    var form_id=form_id;
    var news_id =$('#news_id').html();
    // alert(news);
    var dataString = 'news_id='+news_id;
    console.log(dataString);
    $.ajax({
      type:"POST",
      url:"news/php_script/delete.php",
      data:dataString,
      cache:true,
      success:function(html) {
      // $( "*" ).prop("readOnly", true);
      // $("[id$=CHID]").prop("readOnly", true);
      $("input[type=text],input[type=email],input[type=number],input[type=password],input[type=radio],select, textarea").val("");
      $('#news_id').html('XX');
        alert(html);
        // $('#msg').html(html);  
      }
    });
    return false;
}
</script>