var menu = document.querySelector('.menu');
var nav = document.querySelector('.links');
var navLinks = document.querySelectorAll('.links li');
var background = document.querySelector('.header-div');
var dots = document.getElementsByClassName("dd");
menu.addEventListener('click', function(){

	nav.classList.toggle('navigation-active');
	navLinks.forEach((link,index)=>{
		if(link.style.animation){
		link.style.animation = '';
		}else{
			link.style.animation = `Fade 0.5s ease forwards ${index/7+0.6 }s`;
		}
	});

	menu.classList.toggle('toggle');

});

function currentDiv(n) {
  if(n == 1){
  	background.style.backgroundImage = "url('img/shopping1.jpg')";
  }else if(n == 2){
  	background.style.backgroundImage = "url('img/shopping2.png')";
  }else{
  	background.style.backgroundImage = "url('img/shopping3.jpg')";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" white", "");
  }
    dots[n-1].className += " white";

}

var login = document.querySelector('.regForm');
var register = document.querySelector('.regForm1');
var regbtn = document.querySelector('#regbtn');
var logbtn = document.querySelector('#logbtn');


register.style.display = 'none';

regbtn.addEventListener('click',function(){
    
  login.style.display = 'none';
  register.style.display = "";

});
logbtn.addEventListener('click',function(){
    
  login.style.display = '';
  register.style.display = "none";

});


var blah = document.getElementById("blah");
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var flag = 0;var flag2 = 0;var flag3 = 0;var flag4 = 0;flag5 =0;
var reisterbutton = document.getElementById("registerbutton");



reisterbutton.style.display = "none";
var mail = document.getElementById("email1");
var emailText = document.getElementById("emailText");

emailText.onkeyup = function ValidateEmail()
{
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(emailText.value.match(mailformat))
  {
    mail.innerHTML = "Email valid";
    flag5 = 1;
  }else{
    mail.innerHTML = "invalid email";
    flag5 = 0;
  }
}



myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
    flag = 1;
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
    flag = 0;
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
    flag2 = 1;
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
    flag2 = 0;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
    flag3 = 1;
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
    flag3 = 0;
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    flag4 = 1;
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
    flag4 = 0;
  }
  if(flag&&flag2&&flag3&&flag4&&flag5){
    reisterbutton.style.display = "";
  }else{
    reisterbutton.style.display = "none";
  }
}

var logo = document.querySelector(".logo-div");

logo.addEventListener('click',function(){
   
  document.location = 'index.php';

});
