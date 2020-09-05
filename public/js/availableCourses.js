var selectedCourses=[];
var selectedCoursesID = [];
var total_selected_units = 0;

//selected_div_top_error
if(total_selected_units ==  0){
    $('.selected_div_top_error').css('display', 'block');
}else{
    $('.selected_div_top_error').css('display', 'none');
}
//trclick Function
function trclick(id,name, unit, mainId){
    if( !($("#"+mainId).hasClass('selected')) ){
        var htmlfield = '<div id="selectedCourse_'+mainId+'" class="selected-textbox"><p>'+ name +'</p><div onclick="unselect(' +"'"+ id +"'"+','+"'"+name+"'" +','+"'"+unit+"'" +','+"'"+mainId+"'" + ')" class="fa-close-div"><i class="fa fa-times" ></i></div></div>';
        $('.selected-content-div').append(htmlfield);        

        $("#"+mainId).addClass('selected');
        selectedCourses.push(name);
        $("#selectedCourses").val(selectedCourses.toString());
        
        selectedCoursesID.push(mainId);
        $("#selectedCoursesID").val(selectedCoursesID.toString());
        
        total_selected_units = total_selected_units + parseInt(unit);
        $('#total_unit').val(total_selected_units);
        $('#total_unit').innerHTML = $('#total_unit').val();
        //selected_div_top_error
        if(total_selected_units ==  0){
            $('.selected_div_top_error').css('display', 'block');
        }else{
            $('.selected_div_top_error').css('display', 'none');
        }
    }
}
// unselect Function
function unselect(id, name, unit, mainId) {
    $("#selectedCourse_"+mainId).remove();
    $("#"+mainId).removeClass('selected');
    removeElement(selectedCourses, name);
    $("#selectedCourses").val(selectedCourses.toString());
    
    removeElement(selectedCoursesID, mainId);
    $("#selectedCoursesID").val(selectedCoursesID.toString());
    
    // console.log(selectedCourses);
    
    total_selected_units = total_selected_units - parseInt(unit);
    $('.total_unit').val(total_selected_units); 
    //selected_div_top_error
    if(total_selected_units ==  0){
        $('.selected_div_top_error').css('display', 'block');
    }else{
        $('.selected_div_top_error').css('display', 'none');
    }
}
//removeElement from array function
function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
}

//Search Function
function mySearch() {
    var input, filter, table, tr, i,span0,span1, txtValue0,txtValue1;
    input = document.getElementById("myInput");
    filter = input.value;
    table = document.getElementById("courses-table");
    tr = table.getElementsByTagName("tr");
    
    if($("#myInput").val().trim().length == 0) {
        // console.log($("#myInput").val().trim().length);
        for (i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
        return;
    }
    for (i = 0; i < tr.length; i++) {

        span0 = tr[i].getElementsByTagName("span")[0];
        span1 = tr[i].getElementsByTagName("span")[1];

        if (span0 ||span1 ){

            txtValue0 = span0.textContent || span0.innerText;
            txtValue1 = span1.textContent || span1.innerText;

            if (txtValue0.toString().indexOf(filter) > -1 || txtValue1.toString().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        } 
    }
}

//submit selected Courses
function submitSelectedCourses() {
    if(selectedCourses.length ==  0){             
        Swal.fire({
            icon: 'error',
            title: "لطفا ابتدا دروس مورد نظر خود را انتخاب کنید",
            showConfirmButton: true,
            timer: 3000, 
            confirmButtonText:'بستن',
        });
    }  
    else{
        localStorage.setItem("selectedCoursesInAvailablePage", selectedCourses); 
        localStorage.setItem("selectedCoursesIDInAvailablePage", selectedCoursesID);
        $("#selectedCoursesForm").submit();
    }
}

//typesFilter
$('#typesFilter').on('change', function() {
    var value = $(this).val();
    if(value != "همه"){
        table = document.getElementById("courses-table");
        tr = table.getElementsByTagName("tr");
        for(var i=0 ; i < tr.length ; i++){
            span1 = tr[i].getElementsByTagName("span")[1];
            // console.log(span1.textContent == value , span1.textContent , value);
            if(span1.textContent == value){
                tr[i].style.display = "";
            }else{
                tr[i].style.display = "none";
            }
        }
    }else{
        for(var i=0 ; i < tr.length ; i++){
            tr[i].style.display = "";
        }
    }
});

$(document).ready(function() { 
    //coursesFilter 
    // $('.coursesFilter').select2({
    //     placeholder:'دانشکده',
    //     allowClear: true,
    //     minimumResultsForSearch: -1
    // });
    //groupsFilter
    // $('.groupsFilter').select2({
    //     placeholder:'گروه آموزشی',
    //     allowClear: true,
    //     minimumResultsForSearch: -1
    // });
    //typesFilter
    $('.typesFilter').select2({
        placeholder:'نوع درس',
        allowClear: true,
        minimumResultsForSearch: -1
    });
    //termsFilter
    // $('.termsFilter').select2({
    //     placeholder:'ترم',
    //     allowClear: true,
    //     minimumResultsForSearch: -1
    // });
    
    //localStorage
    if(localStorage.getItem("selectedCoursesIDInAvailablePage") != undefined) {
        var coursesArray = localStorage.getItem("selectedCoursesIDInAvailablePage").split(",");
        for (var i = 0; i < coursesArray.length; i++) {
            $('#'+coursesArray[i]).click();
        }
    }
});


