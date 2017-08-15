
$(document).ready(function(){
	
	$('.fcontent h1, .fcontent a').css('display','block');
	
	digitarTexto('.fcontent h2', 40, function(){
		digitarTexto('.fcontent h3', 50, function(){});
		});
		
	$(".player").YTPlayer();
	
	ajustaAltura();
	
	$(window).resize(function () {
		ajustaAltura();
	});
	
});

var digitarTexto = function(textoID, time, sucess){
	var sqinterval = '';
	var sqcount = 0;
	var sqtext = '';
	var textoID = textoID;
	sqtext = sqtext=='' ? $(textoID).html().split("") : sqtext;
	sqinterval = window.setInterval(function(){
		if( sqcount == 0 ){
			$(textoID).html('');
			$(textoID).css('display', 'block');
		}
		$(textoID).append(sqtext[sqcount]);
		if(sqcount>sqtext.length){ window.clearInterval(sqinterval); sucess(); }
		sqcount++;
		return;
	}, time);
}

function ajustaAltura() {
    var maiorAltura = 0;
    var altura = 0;
    var w = $(window).width();
	$('#o-que-fazemos .tab').each(function () {
		$(this).removeAttr('style');
		altura = $(this).outerHeight();
		if (altura > maiorAltura) {
			maiorAltura = altura;
		}
		$('#o-que-fazemos .tab').outerHeight(maiorAltura);
	});
}