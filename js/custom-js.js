// show the title when tab is not active
	// $(function () {
		// var message = "Don't forget us";
		// var original;

		// $(window).focus(function() {
		// 	if(original) {
		// 		document.title = original;
		// 	}
		// }).blur(function() {
		// 	var title = $('title').text();
		// 	if(title != message) {
		// 		original = title;
		// 	}
		// 	document.title = message;
		// });
	// });
// show the title when tab is not active end

// disable right click on page if return false
document.oncontextmenu =new Function("return true;");
// carousel Starts
$('.carousel').carousel({
      interval: 3000
});

// Work for carousel indicator
var slideqty = $('#featured .item').length;
    for (var i = 0; i < slideqty; i++) {
        var insertText = '<li data-target="#featured" data-slide-to="'+i+'"></li>';
        $('#featured ol').append(insertText);
        
    };

// carousel ends
// Reset form data and set readOnly property false
$(document).ready(function(){
	$("input[type=reset], button[type=reset]").click(function(){
		$( "*" ).prop("readOnly", false);
	// $("input[type=text],input[type=email],input[type=number],select, textarea").val("");
		$('#news_id').html('XX');
	});
});
// Print a Section
function printSection (section_id) {
	var restore_page =document.body.innerHTML;
	var print_section = document.getElementById(section_id).innerHTML;
	document.body.innerHTML = print_section;
	window.print();
	document.body.innerHTML = restore_page;
}


// Table row click effect
	var pickedup;
	$( ".order_tables tbody tr" ).on( "click", function( event ) {
 
          // get back to where it was before if it was selected :
          if (pickedup != null) {
              pickedup.css( "background-color", "#fff" );
          }
 
           // $("#fillname").val($(this).find("td").eq(0).html());

          $(this).css( "background-color", "#DDF6FC" );
 
          pickedup = $(this);
         window.pick= $(this).find("td").eq(0).html();
         pick_key= $(this).find("td").eq(0).html();

         Reflect(pick_key);	
          // Approve(pick_key);
         $("#fillname").val(pick_key);
         // $("#fillname").val(window.pick); 
 	});


// Code for approve
function Approve(){
	var row_id =window.pick
      var r = confirm("Do you want to approve this order ?");
		if (r == true) {
		    
      var dataString = 'selectrow1='+ window.pick;
		$.ajax({
			type:"POST",
			url:"php/requested_order.php",
			data:dataString,
			cache:false,

			beforeSend:function(){
				$('#loader_container').show();
				$('#loader').addClass('loader');
				$('body').addClass('body');
			},
			success:function(html) {
			// $( "*" ).prop("readOnly", true);
			// $("[id$=CHID]").prop("readOnly", true);
			// $("input[type=text],input[type=email],input[type=number],input[type=password],input[type=radio],select, textarea").val("");
				setTimeout(function() {
				   $('#loader').removeClass('loader');
				   $('body').removeClass('body');
				   $('#loader_container').hide();
				   $('#msgo3').fadeIn();
				   $('#msgo3').html(html);
				   $('#'+row_id).parents("tr").remove();	
				   $('#msgo3').delay(6000).fadeOut();	
				}, 2000);	

			}
		});
		return false;
		} else {

		}
}


// Sending keyfield value to php i.e. php/reflect.php
function Reflect(pick_key){
	var dataString = 'selectrow1='+ pick_key;
		$.ajax({
			type:"POST",
			url:"php/reflect.php",
			data:dataString,
			cache:false,
			success:function(html) {

			$('#tablebody').html(html);

				
			}
		});
}



// 2nd style
// <!-- Script for order1 table Recieve data from server-->
$(document).ready(function(){
   var url = 'php/recieve1.php';
      $.getJSON(url, function(data1) {
          $.each(data1, function(index, data1) {
	 
	$('#tablebody1').append('<tr><td>'  + this.keyfield+ '</td> <td>' + this.order1_no 
					+'</td> <td>'+this.order1_type+ '</td> <td>' 
					+ this.order1_date+'</td> <td>'+this.order1_client_code 
					+'</td> <td>' + this.order1_client_name +'</td> <td>'+
					this.order1_amount +'</td> <td>' + this.order1_flag +'</td></tr>')

    });
 
   });
});        


// <!-- Script for order2 table Recieve data from server-->
$(document).ready(function(){
   var url = 'php/reflect.php';
      $.getJSON(url, function(data) {
          $.each(data, function(index, data) {
	 
	$('#tablebody').append('<tr><td>'  + this.keyfield+ '</td> <td>' + this.order2_pos_no 
					+'</td> <td>'+this.order2_prod_code+ '</td> <td>' 
					+ this.order2_price+'</td> <td>'+this.order2_description 
					+'</td> <td>' + this.order2_flag +'</td></tr>')

    });
 
   });
});   

function saveFormData(form_id){
		var form_id=form_id;
		var dataString = $(form_id).serialize()+'&form_id='+form_id;
		// console.log(dataString);
		$.ajax({
			type:"POST",
			url:"php/save.php",
			data:dataString,
			cache:true,
			beforeSend:function(){
				$('#loader_container').show();
				$('#loader').addClass('loader');
				$('body').addClass('body');
			},
			success:function(html) {
			// $( "*" ).prop("readOnly", true);
			// $("[id$=CHID]").prop("readOnly", true);
			// $("input[type=text],input[type=email],input[type=number],input[type=password],input[type=radio],select, textarea").val("");
				setTimeout(function() {
				   $('#loader').removeClass('loader');
				   $('body').removeClass('body');
				   $('#loader_container').hide();
				   alert(html);
				}, 2000);	

			}
		});
		return false;
}

function updateFormData(form_id, code){
	
		var form_id=form_id;
		var dataString = $(form_id).serialize()+'&form_id='+form_id +'&code='+code ;
		console.log(dataString);
		$.ajax({
			type:"POST",
			url:"php/update.php",
			data:dataString,
			cache:true,
			success:function(html) {
				alert(html);
				// $('#msg').html(html);	
			}
		});
		return false;
}

// Custom Scroll bar
// $(document).ready(function(){
// 	  $("#sidebar-wrapper, body ").niceScroll({
// 		  scrollspeed: 50,
// 		  autohidemode : false,
// 		  cursorwidth : 10,
// 		  cursorborderradius: 8,
// 		  cursorborder : "0",
// 		  background : "rgba(7, 96, 148, .4)",
// 		  cursorcolor : '#1f1f1f',
// 		  zindex : 999
// 	  });
// });


$(document).ready(function(){
	// $("header").load("header.php"); 
	$(".footer").load("footer.html"); 
	$(".login_form").hide();
	
// code for focus next input fields after pressing enter
  $("input, textarea").change(function() {
    var inputs = $(this).closest('form').find(':input');
    inputs.eq( inputs.index(this)+ 1 ).focus();
  });
});

// code for filter the table only using javascript goes here
 (function(document) {
  'use strict';
  var LightTableFilter = (function(Arr) {
    var _input;
    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });
})(document);
// code for filter the table only using javascript end here

// code for remove table row on click
function Remove(id){
	$('#'+id).parents("tr").remove();
}
// code for remove table row on click end
