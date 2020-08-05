// $(document).ready(function() {
// 	$("#submit").click(function() {
// 	var locationCode = $("#location_code").val();
// 	var locationName = $("#location_name").val();
// 	if (locationCode == '' || locationName == '' ) {
// 	alert("Insertion Failed Some Fields are Blank....!!");
// 	} else {
// 		// Returns successful data submission message when the entered information is stored in database.
// 		$.post("../php/location.php", {
// 			lcode1: locationCode,
// 			lname1: locationName
// 		}, function(data) {
// 			alert(data);
// 			$('#locationReset')[0].reset(); // To reset form fields
// 			});
// 		}
// 	});
// });


// $('#locationReset').submit(function(){
// 	return false;
// });

// $('#insert').click(function(){
// 	$.post(		
// 		$('#locationReset').attr('action'),
// 		$('#locationReset :input').serializeArray(),
// 		function(result){
// 			$('#result').html(result);
// 		}
// 	);
// });