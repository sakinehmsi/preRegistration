//Scroll Down Navbar Fixed
window.onscroll = function() {myFunction()};

// Get the header
var navbar = document.getElementById("myNavbar");
var menu = document.getElementById("mymenu");
var pagedate = document.getElementById("mydate");
var myDropdownBtn = document.getElementById("myDropdownBtn");
var myDropdown = document.getElementById("my_dropdown_content");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;
var newmenu = menu.offsetTop;
var newdate = pagedate.offsetTop;
// var newmyDropdown = myDropdown.offsetTop;
// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky ) {
    navbar.classList.remove("navbar");
    navbar.classList.add("sticky");
    menu.classList.remove("page-menu");
    menu.classList.add("newmenu");
    pagedate.classList.remove("page-date");
    pagedate.classList.add("newdate");
    myDropdownBtn.classList.remove("dropdown");
    myDropdownBtn.classList.add("new_dropdown");
    myDropdown.classList.remove("dropdown_content");
    myDropdown.classList.add("new_dropdown_content");
  } else {
    navbar.classList.remove("sticky");
    navbar.classList.add("navbar");
    menu.classList.remove("newmenu");
    menu.classList.add("page-menu");
    pagedate.classList.add("page-date");
    pagedate.classList.remove("newdate");
    myDropdownBtn.classList.add("dropdown");
    myDropdownBtn.classList.remove("new_dropdown");
    myDropdown.classList.add("dropdown_content");
    myDropdown.classList.remove("new_dropdown_content");
  }
}

//session
// var idleTime = 0;
// $(document).ready(function () {
//     //Increment the idle time counter every minute.
//     var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

//     //Zero the idle timer on mouse movement.
//     $(this).mousemove(function (e) {
//         idleTime = 0;
//     });
//     $(this).keypress(function (e) {
//         idleTime = 0;
//     });
// });

// function timerIncrement() {
//     idleTime = idleTime + 1;
//     if (idleTime > 19) { // 20 minutes
//         window.location.reload();
//     }
// }