
var iniciarSimulacao = function(){
	empresa = "Seu Negócio"
	atividade = "produto que você vende";
	if( empresa.length<2 ){ 
		alert('Por favor informe o nome de sua empresa');
		return;
	}
	if( atividade.length<2 ){ 
		alert('Por favor informe a atividade principal de sua empresa');
		return;
	}
	$('#ad-search-query').html(atividade);
	$('.ad-headline, .fenome').html(empresa);
	$('.itens-sim').fadeIn('slow');	
	$('.empresaurl').html(lower(capturar(empresa)));
	$('.ad-url, .empresaurlfull').html('www.'+lower(capturar(empresa))+'.com.br');
	/*$('html, body').animate({
		scrollTop: $('.adwords').offset().top
	}, 1000);*/
	window.setTimeout(function(){ digitarTexto('#ad-search-query', 70, function(){$('.ad-search-results').fadeIn('slow');});} , 1500);
}

$(document).ready(function(){
	
	digitarTexto('#contrate h2', 40, function(){});
	
	iniciarSimulacao();
	
	$('.midias-list li a').click(function(e) {
        $(this).parent().parent().find('li.selected').removeClass('selected');
		$(this).parent().addClass('selected');
		index = $(this).parent().index();
		$('.midias-divs > div.selected').removeClass('selected');
		$('.midias-divs > div').eq(index).addClass('selected');
		return false;
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

var lower = function(string){
	string = string.toLowerCase();
	return string;
}

function capturar(v) {
  return removeSpecialCharSimple(trim(v)); 
}  		

function trim(e){ 
	espacos = /\s/g; 
	return e.replace(espacos, "");
}  		

 function removeSpecialCharSimple(o) {
          return o;
    }