$('#lessonnameError').css('display' , 'none');
$('#lessonidError').css('display' , 'none');
$('#profossornameError').css('display' , 'none');
$('#examdateError').css('display' , 'none');



$('#add-btn').on('click' , function() {
  var lessonError = false;
  var idError = false;
  var profossorError = false;
  var examError = false;
  var lesson_name = $.trim($('#lesson_nameInput').val());
    if (lesson_name == '') {
    $('#lessonnameError').css('display' , 'block');
    lessonError = true;
    } else {
    $('#lessonnameError').css('display' , 'none');
    }

    var lesson_id = $.trim($('#lesson_idInput').val());
    if (lesson_id == '') {
    $('#lessonidError').css('display' , 'block');
    idError = true;
    } else {
    $('#lessonidError').css('display' , 'none');
    }

     var professor_name = $.trim($('#professor_nameInput').val());
    if (professor_name == '') {
    $('#profossornameError').css('display' , 'block');
    profossorError = true;
    } else {
    $('#profossornameError').css('display' , 'none');
    }

      var exam_datetime = $.trim($('#exam_datetimeInput').val());
    if (exam_datetime == '') {
    $('#examdateError').css('display' , 'block');
    examError = true;
    } else {
    $('#examdateError').css('display' , 'none');
    }



if(lessonError == false &&  idError == false && profossorError==false && examError==false){
  
  $("#lesson_name").val($('#lesson_nameInput').val());
  $("#lesson_id").val($('#lesson_idInput').val());
  $("#professor_name").val($('#professor_nameInput').val());
  $("#kind_of_lesson").val($('#kind_of_lessonInput').find(":selected").text());
  $("#class_day").val($('#class_dayInput').find(":selected").text());
  $("#class_time").val($('#class_timeInput').find(":selected").text());
  $("#class_day_two").val($('#class_day_twoInput').find(":selected").text());
  $("#class_time_two").val($('#class_time_twoInput').find(":selected").text());
  $("#vahed").val($('#vahedInput').find(":selected").text());
  $("#exam_datetime").val($('#exam_datetimeInput').val());
  $('#addlesson-form').submit();


}
});


/*$('#add-btn').click(function(){  
var is_valid=true;

$('#lesson_name_error').html('');

if($('#lesson_nameInput').val() == '')
  { 
    $('#lesson_name_error').html('');
    $('#lesson_name_error').append('نام درس الزامیست');
    is_valid = false;
  }



if(is_valid)
  {
  $("#lesson_name").val($('#lesson_nameInput').val());
  $("#lesson_id").val($('#lesson_idInput').val());
  $("#professor_name").val($('#professor_nameInput').val());
  $("#kind_of_lesson").val($('#kind_of_lessonInput').find(":selected").text());
  $("#class_day").val($('#class_dayInput').find(":selected").text());
  $("#class_time").val($('#class_timeInput').find(":selected").text());
 $("#class_day_two").val($('#class_day_twoInput').find(":selected").text());
  $("#class_time_two").val($('#class_time_twoInput').find(":selected").text());
   $("#vahed").val($('#vahedInput').find(":selected").text());
  $("#exam_datetime").val($('#exam_datetimeInput').val());





console.log(is_valid);

    $('#addlesson-form').submit();
    is_valid = true;
     }
 });*/