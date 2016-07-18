var $form = $('#loginForm'),
	$button = $('#mostrar'),
	$banner = $('#banner'),
	$bannerIzq = $('#bannerIzq'),
	$bannerDer = $('#bannerDer'),
	myVar, cont = 1, maxBanner = 5, mueve = 1;

// (function myFunction() {
//     myVar = setInterval(bannerFunc, 5000);
// })();

$(function() {

	var width = 820;
	var animationSpeed = 1000;
	var pause = 3000;
	var currentSlide = 1;

	//cache DOM
	var $slider = $('#slider');
	var $slideContainer = $slider.find('.slides');
	var $slides = $slideContainer.find('.slide');

	var interval;

	function startSlider() {
		interval = setInterval(function() {
			$slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
				currentSlide++;
				if (currentSlide === $slides.length) {
					currentSlide = 1;
					$slideContainer.css('margin-left', 0);
				}
			});
		}, pause);
	}

	function stopSlider(){
		clearInterval(interval);
	}

	$slider.on('mouseenter', stopSlider).on('mouseleave', startSlider);

	startSlider();
});

// $(function() {
// 	setInterval(function() {
// 		$('#slider .slides').animate({'margin-left': '-=820px'}, 1000);
// 	}, 3000);
// });

function bannerFunc(mueve) 
{
	if(mueve == "adelanta")
    	cont++;
	else if(mueve == "regresa")
		cont--;
	else
		cont++;

    if(cont > maxBanner)
    	cont = 1;
    else if(cont < 1)
    	cont = maxBanner;

    $banner.fadeOut(10);
    $banner.css('background-image', 'url("../banner/banner' + cont + '.jpg")');
    $banner.fadeIn();

}

function adelantarBanner()
{
	bannerFunc("adelanta");	
}

function regresarBanner()
{
	bannerFunc("regresa");
}
	 
function mostrarFormulario() {
	$form.slideToggle();
	return false;
	
}

//Eventos
(function () {
	$form.slideUp(1);
})();

$button.click(mostrarFormulario);
$bannerDer.click(adelantarBanner);
$bannerIzq.click(regresarBanner);