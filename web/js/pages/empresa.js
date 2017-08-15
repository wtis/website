var decimal_places = 1;
var decimal_factor = decimal_places === 0 ? 1 : decimal_places * 10;

//Load vars by JSON
/*var nClientes = 5379;
var nClientesMes = 129;
var nSites = 189;
var nHospedagem = 234;
var nRedesSociais = 12;
var nServidores = 37;
var nEmkt = 3023089;
var nSms = 3247;*/
var initNumberAnim = false;
var initNumberAnimation = null;
var whoisObj = '';
$.getJSON( whoisURL , function(data) {	
	whoisObj = data;	
	initNumberAnimation = function(){
		if(!initNumberAnim){
		$('#n-clientes strong').animateNumber({ number: whoisObj.nClientes, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));}  },4000);
		$('#n-clientes-mes strong').animateNumber({ number: whoisObj.nClientesMes, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));}  },4000);
		$('#n-sites strong').animateNumber({ number: whoisObj.nSites, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));}  },4000);
		$('#n-hospedagem strong').animateNumber({ number: whoisObj.nHospedagem, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));}  },4000);
		$('#n-rsociais strong').animateNumber({ number: whoisObj.nRedesSociais, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));}  },4000);
		$('#n-servidores strong').animateNumber({ number: whoisObj.nServidores, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));}  },4000);
		$('#n-emkt strong').animateNumber({ number: whoisObj.nEmkt, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));} },4000);
		$('#n-sms strong').animateNumber({ number: whoisObj.nSms, numberStep: function(now, tween) {$(tween.elem).text(number_format(Math.round(now)));}  },4000);
		initNumberAnim = true;
		}
	}
	var waypoints = $('#empresa-numeros').waypoint(function(direction) {
		initNumberAnimation();
	}, {
	  offset: '70%'
	})
	
	}).fail(function(data) { alert('Não conseguimos carregar o Whois'); });


$(document).ready(function(){
			
});

