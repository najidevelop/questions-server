var valid=true;
var quesid='';
$(document).ready(function() {
   

   //start form 
   $('#start-button').on('click', function (e) {
		e.preventDefault();
  var formid = $(this).closest("form").attr('id');
		sendform('#' + formid); 
				   
	});
 
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
					noteErrorempty();
				} else   {
				$('#question-text').text(data.content);	
				quesid=data.id;
				var  uldep= $('<ul id="answers-list" class="list-group ques-group">');
			

				$(data.answers).each(function(index, item) {
				
					var lidep=$('<li class="list-group-item d-flex align-items-center list-group-item-default" id="'+'ans-'+item.id+'">');
					var indic=$('<span class="answer-indicator">');
				var anstxt=$('<span class="answer-text">');
				anstxt.text(item.content);
				lidep.append(indic);
				lidep.append(anstxt);
				uldep.append(lidep);
				 
			});
			$('#ans-container').html(uldep);
		
					//noteSuccess(); 	
					$('#question-section').removeClass('d-none').addClass('d-block');
					 
				}  

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				noteError();
		

			}, finally: function () {		 

			}
		});
	}
	function checkform(formid,ansidnum) {	 
		var dataser=  $(formid).serialize() + '&ques='+quesid+'&ans='+ansidnum;		 
		urlval = $(formid).attr("action");

		$.ajax({
			// headers: {
			// 	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 	    },
			url: urlval,
			type: "POST",
			data: dataser,
			//contentType: false,
			//processData: false,

			success: function (data) {
				if (data.length == 0) {
					noteError();
				} else   {
					animateresult($('#'+ansid),data.correct_ans)	;
					
					if(data.result==1){
						$('#u-balance').text(data.balance);
						noteSuccess() ;
					}else{
						noteError();
					}
						 
				}  

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				noteError();
		

			}, finally: function () {		 

			}
		});
	}

   //click on answer event
   var ansid='';
   
   var correctAnswerIndex = 0; // مؤشر الإجابة الصحيحة (0 ل "إجابة 1"، 1 ل "إجابة 2"، وهكذا)
   $('#ans-container').on('click','.list-group-item', function (e) {

  ansid= $(this).attr('id');  
  var ansidnum = ansid.replace("ans-", ""); 
	checkform('#check-form',ansidnum);

   //color correct
   /*
     
    */
   });

function animateresult(selectedObj,correct_ans){
	//show correct answer
	correct_ans='ans-'+correct_ans;
	var corrli=$('#'+correct_ans);
	var indicator = corrli.find('.answer-indicator');
	var id=selectedObj.attr('id');
	indicator.removeClass('incorrect').addClass('correct answer-correct'); 
				  corrli.removeClass('list-group-item-default').addClass('list-group-item-correct');
		  //
	if(id!=correct_ans){
	var indicatorincor=selectedObj.find('.answer-indicator');
	indicatorincor.removeClass('correct').addClass('incorrect answer-incorrect');
	selectedObj.addClass('list-group-item-incorrect');
	}
	
	var questionSection = $('#ques-div');
   
	questionSection.fadeOut(1500);
	 
	$('#start-button').trigger('click');	
	questionSection.fadeIn(1500);
}

   // end click
  });
  function noteSuccess() {
    swal("صح ");
  }
  function noteError() {
    swal("خطا");
  }
  function noteErrorempty() {
    swal("لايوجد اسئلة");
  }