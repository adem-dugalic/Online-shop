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

