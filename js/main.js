$(document).ready( function() {

	// Logo
	var $logo 	= $('#logo');
    var $hellologo = $('#helloworld');
	 if (location.href.indexOf("#") != -1) {
        if(location.href.substr(location.href.indexOf("#"))!='#about'){
        	$logo.show();
        }
        else{
            $hellologo.show();
        }
    }
    
	// Show logo 
	$('#tab-container .tab a').click(function() {
	  
      $logo.slideDown('slow');
      $hellologo.slideUp('slow');

	});
	// Hide logo
	$('#tab-about').click(function() {
	  $logo.slideUp('slow');
      $hellologo.slideDown('slow');
	});	
function animMeter(){
    $(".meter > span").each(function() {
                $(this)
                    .data("origWidth", $(this).width())
                    .width(0)
                    .animate({
                        width: $(this).data("origWidth")
                    }, 1200);
            });
}
animMeter();

      $('#tab-container').easytabs({
        animate			: true,
        updateHash		: true,
        transitionIn	: 'slideDown',
        transitionOut	: 'slideUp',
        animationSpeed	: 800,
        tabActiveClass	: 'active'}).bind('easytabs:midTransition', function(event, $clicked, $targetPanel){
            if($targetPanel.selector=='#resume'){
                    animMeter();
            }
        });
    });


//SLIDER
const next = document.querySelector('.next');
const prev = document.querySelector('.prev');
const slides = document.querySelectorAll('.slide');
const auto = true;
const interval = 5000;
let initSlide;

next.addEventListener('click', function(){
	nextSlide();
	clearInterval(initSlide);
	initSlide = setInterval(nextSlide, interval); //to reset timeout
});

prev.addEventListener('click', function(){
	prevSlide();
	clearInterval(initSlide);
	initSlide = setInterval(nextSlide, interval); //to reset timeout
});

const nextSlide = () => {
	let current = document.querySelector('.current');
	current.classList.remove('current');

	if (current.nextElementSibling) {
		current.nextElementSibling.classList.add('current');
	}
	else{
		slides[0].classList.add('current');
	}

	setTimeout(() => current.classList.remove('current'));
}

const prevSlide = () => {
	let current = document.querySelector('.current');
	current.classList.remove('current');

	if (current.previousElementSibling) {
		current.previousElementSibling.classList.add('current');
	}
	else{
		slides[slides.length - 1].classList.add('current');
	}

	setTimeout(() => current.classList.remove('current'));
}

// Autoplay
if (auto) {
	initSlide = setInterval(nextSlide, interval);
}