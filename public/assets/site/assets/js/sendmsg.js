var urlval = "";

var result = '';
var fileAd = 0;
var gformData = "";
$(document).ready(function () {
	$('#btn-save-info').on('click', function (e) {
		e.preventDefault();
		sendform('#info-form');
	});

	
	$('#upfile').on('click', function (e) {
		fileAd = 0;
		
	});
	$("#upfile").on("change", function () {
		resumable.cancel();
		
	});


// send messag buton 
	$('#btn-send').on('click', function (e) {
		e.preventDefault();
		var formid = 'send-form';
		formid = '#' + formid;
		//cancelBtnId = "#btn-cancel-modal-create";

		//var FileLength = $("#upfile")[0].files.length;
		if (fileAd == 0) {
			// alert("No file selected.");
			sendform(formid);
		} else {

			//alert("File selected.");
			var formData = $(formid).serialize();
			formData +='&isfile=1';
			
			gformData = formData;

			resumable.opts.query.fdata = gformData;
			resumable.opts.target = $(formid).attr("action");
			resumable.assignBrowse(browseFile[0]);
			showProgress();
			//resumable.query({_token:csrtoken,fdata:gformData});
			//	resumable('query',{_token:csrtoken,fdata:gformData} );
			resumable.upload();

			//startLoading();
			ClearErrors();

		}


	});
	//
	// $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
	function sendform(formid) {
		//startLoading();
		ClearErrors();
		//	$formid='#create_form';
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlval = $(formid).attr("action");
		$.ajax({
			url: urlval,
			type: "POST",

			data: formData,
			contentType: false,
			processData: false,
			//contentType: 'application/json',
			success: function (data) {

				if (data.length == 0) {
					//noteError();
				} else if (data == "ok") {

					//noteSuccess();	
					//alert('ok');
					swal("تم الارسال بنجاح");
					
					SuccessSend();
					//	
				}

				// $('.alert').html(result.success);
			}, error: function (errorresult) {
				//	endLoading();
				var response = $.parseJSON(errorresult.responseText);
				// $('#errormsg').html( errorresult );
				swal("لم يتم الحفظ");
				$.each(response.errors, function (key, val) {

					$("#" + "info-form-error").append('<li class="text-danger">' + val[0] + '</li>');

				});

			}, finally: function () {
				//endLoading();

			}
		});
	}
	///resume func

	var browseFile = $('#upfile');

	var resumable = new Resumable({
		simultaneousUploads: 1,
		//target:uploadimg,
		//query:{_token:csrtoken} ,// CSRF token
		query: { _token: csrtoken, fdata: gformData },// CSRF token

		fileType: ['png', 'gif', 'jpeg', 'jpg', 'svg', 'webp', 'mp4', 'mkv', 'm4v', 'mov', 'avi', 'mp3'],
		chunkSize: 1 * 1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
		headers: {
			'Accept': 'application/json'
		},
		testChunks: false,
		throttleProgressCallbacks: 1,
	});

	resumable.assignBrowse(browseFile[0]);
	//	resumable.assignBrowse(Fileimgedit[0]);
	resumable.on('fileAdded', function (file) { // trigger when file picked
		// alert ('ok');
		 fileAd=1;
		// imageChangeForm("#images", "#image_label", "#imgshow");
		// resumeChangeimg(resumable.files,"#images", "#image_label", "#imgshow");
		 var fname= resumable.files[0].fileName;
		 
		 $("#file_label").text(fname);
		//   showProgress();
		//   resumable.upload() // to actually start uploading.
	});

	resumable.on('fileProgress', function (file) { // trigger when file progress update
		updateProgress(Math.floor(file.progress() * 100));
	});
	var fcount = 0;
	resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
		fcount++;
		response = JSON.parse(response);

		result = response.id;

		if (fcount >= resumable.files.length) {
			fcount = 0;
			//endLoading();
			//noteSuccess();
			ClearErrors();
			//	loadgallery('image');
			//	$(cancelBtnId).trigger("click");
			hideProgress();
			swal("تم الارسال بنجاح");
			SuccessSend();

		}

		//	alert(result);
		//  $('#videoPreview').attr('src', response.path);
		//  $('.card-footer').show();
		// alert(response.caption);
	});

	resumable.on('fileError', function (file, response) { // trigger when there is any error
		//	endLoading();
		//	noteError();
		hideProgress();
		ClearErrors();
		//loadgallery('image');
		//$(cancelBtnId).trigger("click");
	});


	let progress = $('.progress');
	function showProgress() {
		progress.find('.progress-bar').css('width', '0%');
		progress.find('.progress-bar').html('0%');
		progress.find('.progress-bar').removeClass('bg-success');
		progress.show();
	}

	function updateProgress(value) {
		progress.find('.progress-bar').css('width', `${value}%`)
		progress.find('.progress-bar').html(`${value}%`)
	}

	function hideProgress() {
		progress.hide();
	}

	//////////
	//end func
});



function resetForm() {
	jQuery('#expert_form')[0].reset();



}
function SuccessSend() {
	//$("#" + "info-form-error").html('');
	$("#send-form").hide();
	$("#result").html("شكرا لك. لقد تم الارسال بنجاح");
}

function ClearErrors() {
	//$("#" + "info-form-error").html('');

}