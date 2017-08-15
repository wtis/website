$(document).ready(function(){
	
	$('.main-slider > div').css('display', 'block');
	$('.main-slider').slick({
        arrows: false,
        autoplay: true,
        speed: 300,
        touchThreshold: 10,
        autoplaySpeed: 6000,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false

    });

    /* Ajusta a altura do slider  */

    var heightWindows = $(window).height() - $('header').height();
    $('.main-slider .slick-slide').height(heightWindows);
    $(window).resize(function () {
        var heightWindows = $(window).height() - $('header').height();
        $('.main-slider .slick-slide').height(heightWindows);
		ajustaAltura();
    });
	ajustaAltura();
	
});

$(window).load(function () {

});

function ajustaAltura() {
    var maiorAltura = 0;
    var altura = 0;
    var w = $(window).width();
	$('.htab').removeAttr('style');
	if(w > 750){
		$('.htab').each(function () {
			$(this).removeAttr('style');
			altura = $(this).outerHeight();
			if (altura > maiorAltura) {
				maiorAltura = altura;
			}
			$('.htab').outerHeight(maiorAltura);
		});
	}
}