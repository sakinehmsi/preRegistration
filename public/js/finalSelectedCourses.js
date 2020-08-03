//show error
if(prerequisitesCourses.length !=  0){
    $('.table1-div').css('border','2px solid red');
    $('.table1-div').css('box-shadow', 'red 0px 0px 20px 8px');
    $('.btn').css('display' , 'block');
}else{
    $('.table1-div').css('border','2px solid green');
    $('.table1-div').css('box-shadow', 'green 0px 0px 20px 8px');
    $('.btn').css('display' , 'none');
}
//error btn onclick
$('#btn').on('click',()=>{
    $('.popup').css({
        'transform':'translateY(0)',
        'z-index':'999'
    });
    $('body').addClass('overlay');
    $('.popup').find('h1').animate({
        left:'0'
    },900);
    $(this).css({
    'z-index':'-1'
    });
});

// error box close btn
$('.close').on('click',() =>{
    $('.popup').css({
        'transform':'translateY(-300%)'
    });
    
    $('body').removeClass('overlay');
    $(this).parent('.popup').siblings('.btn').css({
        'z-index':'1'
    });
});

// show error detail backend
for (var index = 0; index < prerequisitesCourses.length; index++) {
    $('.popup').append(prerequisitesCourses[index]);
} 
//go_to_overbid
$('#go_to_overbid').click(function(){
	window.location.assign('/overbid')
});


