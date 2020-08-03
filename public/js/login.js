//fields of forms
$('.form').find('input, textarea').on('keyup blur focus', function (e) {

	var $this = $(this),
	label = $this.prev('label');

	if (e.type === 'keyup') {
		if ($this.val() === '') {
			label.removeClass(' highlight');
		} else if(($this.val() != '')) {
			label.addClass('active highlight');
		}
	} else if (e.type === 'blur') {
		if( $this.val() === '' ) {
			label.removeClass('active highlight'); 
		}   
	} else if (e.type === 'focus') {
		label.addClass('active highlight');
	}

});	

$('.justNumber').keypress(function(event){

	if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
		event.preventDefault(); //stop character from entering input
	}

});

//go_to_signup
$('#go_to_signup').click(function(){
	$('#login').css('display', 'none');
	$('#signup').css('display', 'block');
});

//show and close forms
function showForm(){
	$('#login').css('display', 'block');
	$('#signup').css('display', 'none');
	$('.form').css('display','block'); 
	$('.main-container').addClass('disable'); 
	$('.head-container').addClass('disable'); 
	$('.page-footer').addClass('disable');
}
function closeLogin(){
	$('.form').css('display','none'); 
	$('.main-container').removeClass('disable'); 
	$('.head-container').removeClass('disable'); 
	$('.page-footer').removeClass('disable');
}

//sign up and login button onclick
function showSignUpPage(){
	window.location.assign('/signup')
}
function showhomePage(){
	window.location.assign('/signin')
}

// sign up labels
if($('#signup_firstname').val() != ''){
	$('#signup_firstname_label').css('display','none');
}
if($('#signup_lastname').val() != ''){
$('#signup_lastname_label').css('display','none');
}
if($('#signup_stuNum').val() != ''){
$('#signup_stuNum_label').css('display','none');
}

//sign in labels
if($('#signin_stuNum').val() != ''){
	$('#signin_stuNum_label').css('display','none');
}
if($('#signin_password').val() != ''){
	$('#signin_password_label').css('display','none');
}
if($('#signin_captcha').val() != ''){
	$('#signin_captcha_label').css('display','none');
}

