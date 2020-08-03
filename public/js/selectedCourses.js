// global variable
var coursesID = [[],[]];
var coursesName =[[],[]]; 
var exams = [];
var class1_err = 0;
var class2_err = 0;
var filterTimes = [[],[]];
//initialize coursesName
for(i = 0; i < 5 ;  i++){
	coursesName[i] = [];
    for(j = 0; j < 6; j++){
        coursesName[i][j] = '';
    }
}
//initialize coursesID
for(i = 0; i < 5 ;  i++){
	coursesID[i] = [];
    for(j = 0; j < 6; j++){
        coursesID[i][j] = '';
    }
}
//initialize filterTimes
for(i = 0; i < 5 ;  i++){
	filterTimes[i] = [];
    for(j = 0; j < 6; j++){
        filterTimes[i][j] = '1';
    }
}

//selectCustomCourses Function
function selectCustomCourses(id, name , class1 , time1 ,  class2 , time2,exam_date , exam_time){
    var firstIndex_class1 = 0, firstIndex_class2 = 0, secondIndex_class1 = 0,
    secondIndex_class2 = 0, notRepetitious = 0 , twoExam = 0;
    
    if( !($("#"+id).hasClass('selected')) ){        
        for(l = 0; l < 5 ;  l++){
            for(k= 0; k < 6; k++){
                if(coursesName[l][k]!= name){
                    continue;
                }else{
                        Swal.fire({
                            icon: 'error',
                            title: "شما یک گروه دیگر از این درس را انتخاب نموده اید", 
                            showConfirmButton: true,
                            timer: 10000, 
                            confirmButtonText:'بستن',
                        });
                        notRepetitious =1 ;
                }
            }
        }
        
        if(notRepetitious == 0 ){
            if(exams.length > 0){
                for(x = 0; x < exams.length ;  x++){
                    if( exams[x][1] == exam_date && exams[x][2] ==  exam_time){
                        twoExam = 1 ;
                        Swal.fire({
                            icon: 'error',
                            title:"تداخل در امتحانات" , 
                            showConfirmButton: true,
                            timer: 10000, 
                            confirmButtonText:'بستن',
                        });
                        
                    }else{
                        twoExam = 0;
                        continue;
                    }
                }
            }
        }
        
        
        if(notRepetitious == 0 && twoExam == 0){
            if( class1  == 'شنبه' ){
                if(  time1 == '8:00--9:30' ){
                    if(coursesName[0][0] == '' ){
                        firstIndex_class1 = 0;
                        secondIndex_class1 = 0;
                        class1_err = 0;
                    }                                        
                    else{                     
                        class1_err = 1;
                    }
                }
                else if( time1 == '9:30--11:00') {
                    if(coursesName[0][1] == '' ){
                        firstIndex_class1 = 0;
                        secondIndex_class1 = 1;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '11:00--12:30') {
                    if(coursesName[0][2] == '' ){
                        firstIndex_class1 = 0;
                        secondIndex_class1 = 2;
                        class1_err = 0;
                    }                                        
                    else{                     
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '2:00--3:30'){
                    if(coursesName[0][3] == '' ){
                        firstIndex_class1 = 0;
                        secondIndex_class1 = 3;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '3:30--5:00'){
                    if(coursesName[0][4] == '' ){
                        firstIndex_class1 = 0;
                        secondIndex_class1 = 4;
                        class1_err = 0;
                    }                                        
                    else{                     
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '5:00--6:30'){
                    if(coursesName[0][5] == '' ){
                        firstIndex_class1 = 0;
                        secondIndex_class1 = 5;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }            
            }
            else if( class1  == 'یک شنبه' ){
                if(  time1 == '8:00--9:30' ){
                    if(coursesName[1][0] == '' ){
                        firstIndex_class1 = 1;
                        secondIndex_class1 = 0;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }
                }
                else if( time1 == '9:30--11:00') {
                    if(coursesName[1][1] == '' ){
                        firstIndex_class1 = 1;
                        secondIndex_class1 = 1;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '11:00--12:30') {
                    if(coursesName[1][2] == '' ){
                        firstIndex_class1 = 1;
                        secondIndex_class1 = 2;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '2:00--3:30'){
                    if(coursesName[1][3] == '' ){
                        firstIndex_class1 = 1;
                        secondIndex_class1 = 3;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '3:30--5:00'){
                    if(coursesName[1][4] == '' ){
                        firstIndex_class1 = 1;
                        secondIndex_class1 = 4;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '5:00--6:30'){
                    if(coursesName[1][5] == '' ){
                        firstIndex_class1 = 1;
                        secondIndex_class1 = 5;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                } 
            }
            else if( class1  == 'دوشنبه' ){
                if(  time1 == '8:00--9:30' ){
                    if(coursesName[2][0] == '' ){
                        firstIndex_class1 = 2;
                        secondIndex_class1 = 0;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }
                }
                else if( time1 == '9:30--11:00') {
                    if(coursesName[2][1] == '' ){
                        firstIndex_class1 = 2;
                        secondIndex_class1 = 1;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '11:00--12:30') {
                    if(coursesName[2][2] == '' ){
                        firstIndex_class1 = 2;
                        secondIndex_class1 = 2;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '2:00--3:30'){
                    if(coursesName[2][3] == '' ){
                        firstIndex_class1 = 2;
                        secondIndex_class1 = 3;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '3:30--5:00'){
                    if(coursesName[2][4] == '' ){
                        firstIndex_class1 = 2;
                        secondIndex_class1 = 4;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '5:00--6:30'){
                    if(coursesName[2][5] == '' ){
                        firstIndex_class1 = 2;
                        secondIndex_class1 = 5;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                } 
            }
            else if( class1 == 'سه شنبه' ){
                if(  time1 == '8:00--9:30' ){
                    if(coursesName[3][0] == ''){
                        firstIndex_class1 = 3;
                        secondIndex_class1 = 0;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }
                }
                else if( time1 == '9:30--11:00') {
                    if(coursesName[3][1] == '' ){
                        firstIndex_class1 = 3;
                        secondIndex_class1 = 1;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '11:00--12:30') {
                    if(coursesName[3][2] == '' ){
                        firstIndex_class1 = 3;
                        secondIndex_class1 = 2;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '2:00--3:30'){
                    if(coursesName[3][3] == '' ){
                        firstIndex_class1 = 3;
                        secondIndex_class1 = 3;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '3:30--5:00' ){
                    if(coursesName[3][4] == ''){
                        firstIndex_class1 = 3;
                        secondIndex_class1 = 4;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '5:00--6:30'){
                    if(coursesName[3][5] == '' ){
                        firstIndex_class1 = 3;
                        secondIndex_class1 = 5;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                } 
            }
            else if( class1  == 'چهارشنبه' ){
                if(  time1 == '8:00--9:30' ){
                    if(coursesName[4][0] == '' ){
                        firstIndex_class1 = 4;
                        secondIndex_class1 = 0;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }
                }
                else if( time1 == '9:30--11:00') {
                    if(coursesName[4][1] == '' ){
                        firstIndex_class1 = 4;
                        secondIndex_class1 = 1;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '11:00--12:30') {
                    if(coursesName[4][2] == '' ){
                        firstIndex_class1 = 4;
                        secondIndex_class1 = 2;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '2:00--3:30'){
                    if(coursesName[4][3] == '' ){
                        firstIndex_class1 = 4;
                        secondIndex_class1 = 3;
                        class1_err = 0;
                    }                                        
                    else{
                        
                        class1_err = 1;
                    }                     
                }
                else if( time1 == '3:30--5:00'){
                    if(coursesName[4][4] == '' ){
                        firstIndex_class1 = 4;
                        secondIndex_class1 = 4;
                        class1_err = 0;
                    }                                        
                    else{
                        class1_err = 1;
                    }                      
                }
                else if( time1 == '5:00--6:30' ){
                    if(coursesName[4][5] == '' ){
                        firstIndex_class1 = 4;
                        secondIndex_class1 = 5;
                        class1_err = 0;
                    }                                        
                    else{
                        class1_err = 1;
                    }                     
                } 
            }
            
            if(class2 != '-'){
                if(class2  == 'شنبه' ){
                    if( time2 == '8:00--9:30' ){
                        if(coursesName[0][0] == '' ){
                            firstIndex_class2 = 0;
                            secondIndex_class2 = 0;
                            class2_err = 0;
                        }                                        
                        else{
                            class2_err = 1;
                        }
                    }
                    else if(time2 == '9:30--11:00') {
                        if(coursesName[0][1] == '' ){
                            firstIndex_class2 = 0;
                            secondIndex_class2 = 1;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '11:00--12:30') {
                        if(coursesName[0][2] == '' ){
                            firstIndex_class2 = 0;
                            secondIndex_class2 = 2;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '2:00--3:30'){
                        if(coursesName[0][3] == '' ){
                            firstIndex_class2 = 0;
                            secondIndex_class2 = 3;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '3:30--5:00'){
                        if(coursesName[0][4] == '' ){
                            firstIndex_class2 = 0;
                            secondIndex_class2 = 4;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '5:00--6:30'){
                        if(coursesName[0][5] == '' ){
                            firstIndex_class2 = 0;
                            secondIndex_class2 = 5;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }            
                }
                else if(class2  == 'یک شنبه' ){
                    if( time2 == '8:00--9:30' ){
                        if(coursesName[1][0] == '' ){
                            firstIndex_class2 = 1;
                            secondIndex_class2 = 0;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }
                    }
                    else if(time2 == '9:30--11:00') {
                        if(coursesName[1][1] == '' ){
                            firstIndex_class2 = 1;
                            secondIndex_class2 = 1;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '11:00--12:30') {
                        if(coursesName[1][2] == '' ){
                            firstIndex_class2 = 1;
                            secondIndex_class2 = 2;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '2:00--3:30'){
                        if(coursesName[1][3] == '' ){
                            firstIndex_class2 = 1;
                            secondIndex_class2 = 3;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '3:30--5:00'){
                        if(coursesName[1][4] == '' ){
                            firstIndex_class2 = 1;
                            secondIndex_class2 = 4;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '5:00--6:30'){
                        if(coursesName[1][5] == '' ){
                            firstIndex_class2 = 1;
                            secondIndex_class2 = 5;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    } 
                }
                else if(class2  == 'دوشنبه' ){
                    if( time2 == '8:00--9:30' ){
                        if(coursesName[2][0] == '' ){
                            firstIndex_class2 = 2;
                            secondIndex_class2 = 0;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }
                    }
                    else if(time2 == '9:30--11:00') {
                        if(coursesName[2][1] == '' ){
                            firstIndex_class2 = 2;
                            secondIndex_class2 = 1;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '11:00--12:30') {
                        if(coursesName[2][2] == '' ){
                            firstIndex_class2 = 2;
                            secondIndex_class2 = 2;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '2:00--3:30'){
                        if(coursesName[2][3] == '' ){
                            firstIndex_class2 = 2;
                            secondIndex_class2 = 3;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '3:30--5:00'){
                        if(coursesName[2][4] == '' ){
                            firstIndex_class2 = 2;
                            secondIndex_class2 = 4;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '5:00--6:30'){
                        if(coursesName[2][5] == '' ){
                            firstIndex_class2 = 2;
                            secondIndex_class2 = 5;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    } 
                }
                else if(class2 == 'سه شنبه' ){
                    if( time2 == '8:00--9:30' ){
                        if(coursesName[3][0] == ''){
                            firstIndex_class2 = 3;
                            secondIndex_class2 = 0;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }
                    }
                    else if(time2 == '9:30--11:00') {
                        if(coursesName[3][1] == '' ){
                            firstIndex_class2 = 3;
                            secondIndex_class2 = 1;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '11:00--12:30') {
                        if(coursesName[3][2] == '' ){
                            firstIndex_class2 = 3;
                            secondIndex_class2 = 2;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '2:00--3:30'){
                        if(coursesName[3][3] == '' ){
                            firstIndex_class2 = 3;
                            secondIndex_class2 = 3;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '3:30--5:00' ){
                        if(coursesName[3][4] == ''){
                            firstIndex_class2 = 3;
                            secondIndex_class2 = 4;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '5:00--6:30'){
                        if(coursesName[3][5] == '' ){
                            firstIndex_class2 = 3;
                            secondIndex_class2 = 5;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    } 
                }
                else if(class2  == 'چهارشنبه' ){
                    if( time2 == '8:00--9:30' ){
                        if(coursesName[4][0] == '' ){
                            firstIndex_class2 = 4;
                            secondIndex_class2 = 0;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }
                    }
                    else if(time2 == '9:30--11:00') {
                        if(coursesName[4][1] == '' ){
                            firstIndex_class2 = 4;
                            secondIndex_class2 = 1;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '11:00--12:30') {
                        if(coursesName[4][2] == '' ){
                            firstIndex_class2 = 4;
                            secondIndex_class2 = 2;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '2:00--3:30'){
                        if(coursesName[4][3] == '' ){
                            firstIndex_class2 = 4;
                            secondIndex_class2 = 3;
                            class2_err = 0;
                        }                                        
                        else{
                            
                            class2_err = 1;
                        }                     
                    }
                    else if(time2 == '3:30--5:00'){
                        if(coursesName[4][4] == '' ){
                            firstIndex_class2 = 4;
                            secondIndex_class2 = 4;
                            class2_err = 0;
                        }                                        
                        else{
                            class2_err = 1;
                        }                      
                    }
                    else if(time2 == '5:00--6:30' ){
                        if(coursesName[4][5] == '' ){
                            firstIndex_class2 = 4;
                            secondIndex_class2 = 5;
                            class2_err = 0;
                        }                                        
                        else{
                            class2_err = 1;
                        }                     
                    } 
                }
            } 
            
            if(class1_err == 0 && class2_err == 0 ) {
                $("#"+id).addClass('selected');                
                
                coursesID[firstIndex_class1][secondIndex_class1] =  id;
                $("#coursesID").val(coursesID.toString());

                coursesName[firstIndex_class1][secondIndex_class1] =  name;
                $("#coursesName").val(coursesName.toString());
                
                $("#"+firstIndex_class1.toString()+secondIndex_class1.toString()).css('background-color', '#9fddfa');
                $("#"+firstIndex_class1.toString()+secondIndex_class1.toString()).val(name);
                
                var exam = [ id , exam_date , exam_time ];
                exams.push(exam);
                
                if(class2 != '-'){
                    coursesID[firstIndex_class2][secondIndex_class2] =  id;
                    $("#coursesID").val(coursesID.toString());
                    
                    coursesName[firstIndex_class2][secondIndex_class2] =  name;
                    $("#coursesName").val(coursesName.toString());
                    
                    $("#"+firstIndex_class2.toString()+secondIndex_class2.toString()).css('background-color', '#9fddfa');
                    $("#"+firstIndex_class2.toString()+secondIndex_class2.toString()).val(name);
                }
                
            }else {
                Swal.fire({
                    icon: 'error',
                    title: "تداخل در ساعت ها",
                    showConfirmButton: true,
                    timer: 10000, 
                    confirmButtonText:'بستن',
                });
            }
        }
    }   
    //unselect
    else{        
        if(class1  == 'شنبه' ){
            if( time1 == '8:00--9:30' ){
                $("#"+id).removeClass('selected');                
                coursesID[0][0] =  ''; 
                coursesName[0][0] =  '';            
                firstIndex_class1 = 0;
                secondIndex_class1 = 0;
            }
            else if( time1 == '9:30--11:00') {
                $("#"+id).removeClass('selected');
                coursesID[0][1] =  '';
                coursesName[0][1] =  '';                                   
                firstIndex_class1 = 0;
                secondIndex_class1 = 1;
            }
            else if(time1 == '11:00--12:30') {
                $("#"+id).removeClass('selected');
                coursesID[0][2] =  ''; 
                coursesName[0][2] =  '';                        
                firstIndex_class1 = 0;
                secondIndex_class1 = 2;
            }
            else if(time1 == '2:00--3:30'){
                $("#"+id).removeClass('selected');
                coursesID[0][3] =  '';   
                coursesName[0][3] =  '';                   
                firstIndex_class1 = 0;
                secondIndex_class1 = 3;
            }
            else if(time1 == '3:30--5:00'){
                $("#"+id).removeClass('selected');
                coursesID[0][4] =  '';   
                coursesName[0][4] =  ''; 
                firstIndex_class1 = 0;
                secondIndex_class1 = 4;
            }
            else if(time1 == '5:00--6:30'){
                $("#"+id).removeClass('selected');
                coursesID[0][5] =  ''; 
                coursesName[0][5] =  ''; 
                firstIndex_class1 = 0;
                secondIndex_class1 = 5;
            }    
        }
        else if(class1  == 'یک شنبه' ){
            if( time1 == '8:00--9:30' ){
                $("#"+id).removeClass('selected');
                coursesID[1][0] =  ''; 
                coursesName[1][0] =  '';            
                firstIndex_class1 = 1;
                secondIndex_class1 = 0;
            }
            else if(time1 == '9:30--11:00') {
                $("#"+id).removeClass('selected');
                coursesID[1][1] =  '';
                coursesName[1][1] =  '';                                   
                firstIndex_class1 = 1;
                secondIndex_class1 = 1;
            }
            else if(time1 == '11:00--12:30') {
                $("#"+id).removeClass('selected');
                coursesID[1][2] =  '';
                coursesName[1][2] =  '';                        
                firstIndex_class1 = 1;
                secondIndex_class1 = 2;
            }
            else if(time1 == '2:00--3:30'){
                $("#"+id).removeClass('selected');
                coursesID[1][3] =  ''; 
                coursesName[1][3] =  '';                   
                firstIndex_class1 = 1;
                secondIndex_class1 = 3;
            }
            else if(time1 == '3:30--5:00'){
                $("#"+id).removeClass('selected');
                coursesID[1][4] =  '';
                coursesName[1][4] =  ''; 
                firstIndex_class1 = 1;
                secondIndex_class1 = 4;
            }
            else if(time1 == '5:00--6:30'){
                $("#"+id).removeClass('selected');
                coursesID[1][5] =  ''; 
                coursesName[1][5] =  ''; 
                firstIndex_class1 = 1;
                secondIndex_class1 = 5;
            } 
            
        }
        else if(class1  == 'دوشنبه' ){
            if( time1 == '8:00--9:30' ){
                $("#"+id).removeClass('selected');
                coursesID[2][0] =  ''; 
                coursesName[2][0] =  '';            
                firstIndex_class1 = 2;
                secondIndex_class1 = 0;
            }
            else if(time1 == '9:30--11:00') {
                $("#"+id).removeClass('selected');
                coursesID[2][1] =  '';
                coursesName[2][1] =  '';                                   
                firstIndex_class1 = 2;
                secondIndex_class1 = 1;
            }
            else if(time1 == '11:00--12:30') {
                $("#"+id).removeClass('selected');
                coursesID[2][2] =  ''; 
                coursesName[2][2] =  '';                        
                firstIndex_class1 = 2;
                secondIndex_class1 = 2;
            }
            else if(time1 == '2:00--3:30'){
                $("#"+id).removeClass('selected');
                coursesID[2][3] =  '';   
                coursesName[2][3] =  '';                   
                firstIndex_class1 = 2;
                secondIndex_class1 = 3;
            }
            else if(time1 == '3:30--5:00'){
                $("#"+id).removeClass('selected');
                coursesID[2][4] =  ''; 
                coursesName[2][4] =  ''; 
                firstIndex_class1 = 2;
                secondIndex_class1 = 4;
            }
            else if(time1 == '5:00--6:30'){
                $("#"+id).removeClass('selected');
                coursesID[2][5] =  ''; 
                coursesName[2][5] =  ''; 
                firstIndex_class1 = 2;
                secondIndex_class1 = 5;
            } 
        }
        else if(class1 == 'سه شنبه' ){
            if( time1 == '8:00--9:30' ){
                $("#"+id).removeClass('selected');
                coursesID[3][0] =  '';
                coursesName[3][0] =  '';            
                firstIndex_class1 = 3;
                secondIndex_class1 = 0;
            }
            else if(time1 == '9:30--11:00') {
                $("#"+id).removeClass('selected');
                coursesID[3][1] =  ''; 
                coursesName[3][1] =  '';                                   
                firstIndex_class1 = 3;
                secondIndex_class1 = 1;
            }
            else if(time1 == '11:00--12:30') {
                $("#"+id).removeClass('selected');
                coursesID[3][2] =  ''; 
                coursesName[3][2] =  '';                        
                firstIndex_class1 = 3;
                secondIndex_class1 = 2;
            }
            else if(time1 == '2:00--3:30'){
                $("#"+id).removeClass('selected');
                coursesID[3][3] =  ''; 
                coursesName[3][3] =  '';                   
                firstIndex_class1 = 3;
                secondIndex_class1 = 3;
            }
            else if(time1 == '3:30--5:00'){
                $("#"+id).removeClass('selected');
                coursesID[3][4] =  ''; 
                coursesName[3][4] =  ''; 
                firstIndex_class1 = 3;
                secondIndex_class1 = 4;
            }
            else if(time1 == '5:00--6:30'){
                $("#"+id).removeClass('selected');
                coursesID[3][5] =  '';
                coursesName[3][5] =  ''; 
                firstIndex_class1 = 3;
                secondIndex_class1 = 5;
            } 
        }
        else if(class1  == 'چهارشنبه' ){
            if( time1 == '8:00--9:30' ){
                $("#"+id).removeClass('selected');
                coursesID[4][0] =  '';  
                coursesName[4][0] =  '';            
                firstIndex_class1 = 4;
                secondIndex_class1 = 0;
            }
            else if(time1 == '9:30--11:00') {
                $("#"+id).removeClass('selected');
                coursesID[4][1] =  '';
                coursesName[4][1] =  '';                                   
                firstIndex_class1 = 4;
                secondIndex_class1 = 1;
            }
            else if(time1 == '11:00--12:30') {
                $("#"+id).removeClass('selected');
                coursesID[4][2] =  '';
                coursesName[4][2] =  '';                        
                firstIndex_class1 = 4;
                secondIndex_class1 = 2;
            }
            else if(time1 == '2:00--3:30'){
                $("#"+id).removeClass('selected');
                coursesID[4][3] =  '';   
                coursesName[4][3] =  '';                   
                firstIndex_class1 = 4;
                secondIndex_class1 = 3;
            }
            else if(time1 == '3:30--5:00'){
                $("#"+id).removeClass('selected');
                coursesID[4][4] =  '';
                coursesName[4][4] =  ''; 
                firstIndex_class1 = 4;
                secondIndex_class1 = 0;
            }
            else if(time1 == '5:00--6:30'){
                $("#"+id).removeClass('selected');
                coursesID[4][5] =  '';
                coursesName[4][5] =  ''; 
                firstIndex_class1 = 4;
                secondIndex_class1 = 5;
            } 
        }       

        if(class2 != '-'){
            if(class2  == 'شنبه' ){
                if( time2 == '8:00--9:30' ){
                    $("#"+id).removeClass('selected');
                    coursesID[0][0] =  '';  
                    coursesName[0][0] =  '';            
                    firstIndex_class2 = 0;
                    secondIndex_class2 = 0;
                }
                else if(time2 == '9:30--11:00') {
                    $("#"+id).removeClass('selected');
                    coursesID[0][1] =  '';  
                    coursesName[0][1] =  '';                                   
                    firstIndex_class2 = 0;
                    secondIndex_class2 = 1;
                }
                else if(time2 == '11:00--12:30') {
                    $("#"+id).removeClass('selected');
                    coursesID[0][2] =  ''; 
                    coursesName[0][2] =  '';                        
                    firstIndex_class2 = 0;
                    secondIndex_class2 = 2;
                }
                else if(time2 == '2:00--3:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[0][3] =  ''; 
                    coursesName[0][3] =  '';                   
                    firstIndex_class2 = 0;
                    secondIndex_class2 = 3;
                }
                else if(time2 == '3:30--5:00'){
                    $("#"+id).removeClass('selected');
                    coursesID[0][4] =  ''; 
                    coursesName[0][4] =  ''; 
                    firstIndex_class2 = 0;
                    secondIndex_class2 = 4;
                }
                else if(time2 == '5:00--6:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[0][5] =  ''; 
                    coursesName[0][5] =  ''; 
                    firstIndex_class2 = 0;
                    secondIndex_class2 = 5;
                }            
            }
            else if(class2  == 'یک شنبه' ){
                if( time2 == '8:00--9:30' ){
                    $("#"+id).removeClass('selected');
                    coursesID[1][0] =  ''; 
                    coursesName[1][0] =  '';            
                    firstIndex_class2 = 1;
                    secondIndex_class2 = 0;
                }
                else if(time2 == '9:30--11:00') {
                    $("#"+id).removeClass('selected');
                    coursesID[1][1] =  '';
                    coursesName[1][1] =  '';            
                    firstIndex_class2 = 1;
                    secondIndex_class2 = 1;                                  
                }
                else if(time2 == '11:00--12:30') {
                    $("#"+id).removeClass('selected');
                    coursesID[1][2] =  '';
                    coursesName[1][2] =  '';            
                    firstIndex_class2 = 1;
                    secondIndex_class2 = 2;                       
                }
                else if(time2 == '2:00--3:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[1][3] =  '';
                    coursesName[1][3] =  '';            
                    firstIndex_class2 = 1;
                    secondIndex_class2 = 3;                  
                }
                else if(time2 == '3:30--5:00'){
                    $("#"+id).removeClass('selected');
                    coursesID[1][4] =  '';
                    coursesName[1][4] =  '';            
                    firstIndex_class2 = 1;
                    secondIndex_class2 = 4;
                }
                else if(time2 == '5:00--6:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[1][5] =  '';
                    coursesName[1][5] =  '';            
                    firstIndex_class2 = 1;
                    secondIndex_class2 = 5;
                } 
            }
            else if(class2  == 'دوشنبه' ){
                if( time2 == '8:00--9:30' ){
                    $("#"+id).removeClass('selected');
                    coursesID[2][0] =  '';
                    coursesName[2][0] =  '';            
                    firstIndex_class2 = 2;
                    secondIndex_class2 = 0;           
                }
                else if(time2 == '9:30--11:00') {
                    $("#"+id).removeClass('selected');
                    coursesID[2][1] =  '';
                    coursesName[2][1] =  '';            
                    firstIndex_class2 = 2;
                    secondIndex_class2 = 1;                                   
                }
                else if(time2 == '11:00--12:30') {
                    $("#"+id).removeClass('selected');
                    coursesID[2][2] =  '';
                    coursesName[2][2] =  '';             
                    firstIndex_class2 = 2;
                    secondIndex_class2 = 2;                       
                }
                else if(time2 == '2:00--3:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[2][3] =  '';
                    coursesName[2][3] =  '';             
                    firstIndex_class2 = 2;
                    secondIndex_class2 = 3;                  
                }
                else if(time2 == '3:30--5:00'){
                    $("#"+id).removeClass('selected');
                    coursesID[2][4] =  '';
                    coursesName[2][4] =  '';            
                    firstIndex_class2 = 2;
                    secondIndex_class2 = 4; 
                }
                else if(time2 == '5:00--6:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[2][5] =  '';
                    coursesName[2][5] =  '';            
                    firstIndex_class2 = 2;
                    secondIndex_class2 = 5; 
                } 
            }
            else if(class2 == 'سه شنبه' ){
                if( time2 == '8:00--9:30' ){
                    $("#"+id).removeClass('selected');                
                    coursesID[3][0] =  '';
                    coursesName[3][0] =  '';            
                    firstIndex_class2 = 3;
                    secondIndex_class2 = 0;            
                }
                else if(time2 == '9:30--11:00') {
                    $("#"+id).removeClass('selected');
                    coursesID[3][1] =  '';
                    coursesName[3][1] =  '';            
                    firstIndex_class2 = 3;
                    secondIndex_class2 = 1;                                    
                }
                else if(time2 == '11:00--12:30') {
                    $("#"+id).removeClass('selected');                
                    coursesID[3][2] =  '';
                    coursesName[3][2] =  '';            
                    firstIndex_class2 = 3;
                    secondIndex_class2 = 2;                         
                }
                else if(time2 == '2:00--3:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[3][3] =  '';
                    coursesName[3][3] =  '';            
                    firstIndex_class2 = 3;
                    secondIndex_class2 = 3;                    
                }
                else if(time2 == '3:30--5:00'){
                    $("#"+id).removeClass('selected');
                    coursesID[3][4] =  '';
                    coursesName[3][4] =  '';            
                    firstIndex_class2 = 3;
                    secondIndex_class2 = 4;  
                }
                else if(time2 == '5:00--6:30'){
                    $("#"+id).removeClass('selected');                
                    coursesID[3][5] =  '';
                    coursesName[3][5] =  '';            
                    firstIndex_class2 = 3;
                    secondIndex_class2 = 5;  
                } 
            }
            else if(class2  == 'چهارشنبه' ){
                if( time2 == '8:00--9:30' ){
                    $("#"+id).removeClass('selected');
                    coursesID[4][0] =  '';
                    coursesName[4][0] =  '';            
                    firstIndex_class2 = 4;
                    secondIndex_class2 = 0;             
                }
                else if(time2 == '9:30--11:00') {
                    $("#"+id).removeClass('selected');
                    coursesID[4][1] =  '';
                    coursesName[4][1] =  '';             
                    firstIndex_class2 = 4;
                    secondIndex_class2 = 1;                                  
                }
                else if(time2 == '11:00--12:30') {
                    $("#"+id).removeClass('selected');
                    coursesID[4][2] =  '';
                    coursesName[4][2] =  '';               
                    firstIndex_class2 = 4;
                    secondIndex_class2 = 2;                     
                }
                else if(time2 == '2:00--3:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[4][3] =  '';
                    coursesName[4][3] =  '';             
                    firstIndex_class2 = 4;
                    secondIndex_class2 = 3;                  
                }
                else if(time2 == '3:30--5:00'){
                    $("#"+id).removeClass('selected');                
                    coursesID[4][4] =  '';
                    coursesName[4][4] =  '';             
                    firstIndex_class2 = 4;
                    secondIndex_class2 = 4;
                }
                else if(time2 == '5:00--6:30'){
                    $("#"+id).removeClass('selected');
                    coursesID[4][5] =  '';
                    coursesName[4][5] =  '';             
                    firstIndex_class2 = 4;
                    secondIndex_class2 = 5;
                } 
            }
        }        
        
        $("#coursesID").val(coursesID.toString());
        $("#coursesName").val(coursesName.toString());
        
        $("#"+firstIndex_class1.toString()+secondIndex_class1.toString()).css('background-color', 'white');
        $("#"+firstIndex_class1.toString()+secondIndex_class1.toString()).val('');
        $("#"+firstIndex_class2.toString()+secondIndex_class2.toString()).css('background-color', 'white');
        $("#"+firstIndex_class2.toString()+secondIndex_class2.toString()).val(' ');
        
        for(z = 0; z < exams.length ;  z++){
            if( exams[z][0] == id){
                removeElement(exams ,  exams[z]) ;
            }else{
                continue;
            }
            
        }
    }       

}

//submit selectedCustomCourses
var coursesList = 0;
function submitSelectedCustomCourses() {
	for(i = 0; i < 5 ;  i++){
        for(j = 0; j < 6; j++){
            if(coursesID[i][j] != ''){
                coursesList = 1;
                continue;
            }
        }
    }
    
    if(coursesList ==  0){             
        Swal.fire({
            icon: 'error',
            title: "لطفا ابتدا دروس مورد نظر خود را انتخاب کنید",
            showConfirmButton: true,
            timer: 1000000, 
            confirmButtonText:'بستن',
        });
    }  
    else{
        localStorage.removeItem("selectedCoursesIDInAvailablePage"); 
        $("#selectedCustomCoursesForm").submit();
    }
}

//removeElement from array function
function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
}

//show_filter_div
function show_filter_div() {
    $('.filter_div').css('display' , 'block');
    $('.main-container').addClass('disable'); 
	$('.head-container').addClass('disable'); 
	$('.page-footer').addClass('disable');
}

//get_filter                       
function get_filter(day ,  time) {
	if(!($(day+''+time).hasClass('td_zero'))){
        filterTimes[day][time] = '0' ;
        $(day+''+time).addClass('td_zero');
    }else{
        filterTimes[day][time] = '1' ;
        $(day+''+time).removeClass('td_zero');
    }
    
}