var $form = $('#loginForm'),
	$button = $('#mostrar'),
	$banner = $('#banner'),
	$bannerIzq = $('#bannerIzq'),
	$bannerDer = $('#bannerDer'),
	myVar, cont = 1, maxBanner = 5, mueve = 1;

(function myFunction() {
    myVar = setInterval(bannerFunc, 5000);
})();

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