
$(document).ready(function(){
	
	digitarTexto('#contrate h2', 40, function(){});
	
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