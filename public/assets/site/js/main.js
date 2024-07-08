$(document).ready(function() {
  
 

    var correctAnswerIndex = 2; // مؤشر الإجابة الصحيحة (0 ل "إجابة 1"، 1 ل "إجابة 2"، وهكذا)
  $('.list-group-item').click(function() {
  //color correct
  var corrli=$('#'+correctAnswerIndex);
  var indicator = corrli.find('.answer-indicator');
  var id=$(this).attr('id');
  indicator.removeClass('incorrect').addClass('correct answer-correct'); 
                corrli.removeClass('list-group-item-default').addClass('list-group-item-correct');
        
  if(id!=correctAnswerIndex){
  var indicatorincor=$(this).find('.answer-indicator');
  indicatorincor.removeClass('correct').addClass('incorrect answer-incorrect');
                $(this).addClass('list-group-item-incorrect');
  }
  
  var questionSection = $('#ques-div');
  //questionSection.removeClass('d-block');
  questionSection.fadeOut(1500);
  questionSection.fadeIn(1500);  
  //questionSection.show(1000);  
  });
   
  });