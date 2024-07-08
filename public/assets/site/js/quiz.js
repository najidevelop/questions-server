var valid=true;
$(document).ready(function() {
   

   //start form 
//    $('#start-button').on('click', function (e) {
// 		e.preventDefault();
//   var formid = $(this).closest("form").attr('id');
// 		sendform('#' + formid); 
// 			$('#question-section').removeClass('d-none').addClass('d-block');	   
// 	});
 
	function ClearErrors() {
		$("." + "invalid-feedback").html('').hide();
		$('.is-invalid').removeClass('is-invalid');
	}

	function sendform(formid) {
		ClearErrors();
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlval = $(formid).attr("action");
		$.ajax({
			url: urlval,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,

			success: function (data) {
				if (data.length == 0) {
					noteError();
				} else   {
					noteSuccess(); 	
         
					 
				}  

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				noteError();
				// $.each(response.errors, function (key, val) {
				// //	$("#" + "info-form-error").append('<li class="text-danger">' + val[0] + '</li>');
				// 	// $("#" + key + "-error").addClass('invalid-feedback').text(val[0]).show();
				// 	// $("#" + key).addClass('is-invalid');
				// });

			}, finally: function () {		 

			}
		});
	}

   //end register
   
  });
  function noteSuccess() {
    swal("صح ");
  }
  function noteError() {
    swal("خطا");
  }