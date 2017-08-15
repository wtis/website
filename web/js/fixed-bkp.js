if (typeof scrollReveal == 'function') { window.sr = new scrollReveal(); };

$(document).ready(function(){
	
	if (typeof $( ".sm" ).selectmenu == 'function') { $( ".sm" ).selectmenu(); };
	if (typeof $( ".tt" ).tooltip == 'function') { $( ".tt" ).tooltip(); };
	if (typeof $( ".tip" ).tipTip == 'function') { $(".tip").tipTip({maxWidth: "auto", delay: 0, defaultPosition: 'top'}); };
	if (typeof $('.fullscreen').parallax == 'function') { $('.fullscreen').parallax("50%", 0.1); };
	$('#meLigueModal').modal('show')
	
	//Mask
	//Form meLigueModal
	var SPMaskBehavior = function (val) {
	  return val.replace(/\D/g, '').length === 11 ? '00000-0000' : '0000-00009';
	},
	spOptions = {
	  onKeyPress: function(val, e, field, options) {
		  field.mask(SPMaskBehavior.apply({}, arguments), options);
		}
	};
	
	$('.i-telefone').mask(SPMaskBehavior, spOptions);
	$('.i-telefone-ddd').mask('00');
	
	
	//Passar mouse em um item da tabela de preços
	/*$('.ptable ul li').hover(function() {
        $(this).stop().find('.phover').fadeIn('fast');
    }, function(){
		 $(this).stop().find('.phover').hide();
	});*/
	$( ".ptable ul li" )
  .mouseenter(function() {
    $(this).find('.phover').stop().fadeIn('fast');
  })
  .mouseleave(function() {
    $(this).find('.phover').stop().hide();
  });
	
	$(window).bind('scroll', function() {
         if ($(window).scrollTop() > 83) {
             //$('.header .menu').addClass('fixed');
			 //$('.header .menu').stop(true,false).hide().addClass('fixed1', {duration:500}).show();
         }
         else {
             //$('.header .menu').removeClass('fixed').removeClass('fixed1');
         }
    });
	
	$('.menu ul.menu1 > li').hover(function(){$(this).find('div[class="hover"]').stop().slideToggle('fast')},function(){$(this).find('div[class="hover"]').hide()})
	
	$('.table-func ul.options li').click(function(){
		
		if( $(this).hasClass('disabled') ){
			return false;
		}
		
		$(this).parent().find('li').each(function(index){
			$(this).removeClass('active');
		});
		
		$(this).addClass('active');
		$(this).parent().parent().find('.content > div').stop().each(function(){
			$(this).fadeOut('fast');
		});
		$(this).parent().parent().find('.content #content'+($(this).index()+1)).stop().fadeIn('fast');
		
	});
	//tipTip
	/*$(".tip").tipTip({maxWidth: "auto", delay: 0, defaultPosition: 'top'});*/
	
	$('.aba li a').click(function(){
		
		if( $(this).parent().hasClass('selected') ){
			return false;
		}
		
		$(this).parent().parent().parent().find('li').removeClass('selected');		
		$(this).parent().addClass('selected');
		
		$(this).parent().parent().parent().parent().find('.abas-divs .content').hide();
		$(this).parent().parent().parent().parent().find('.abas-divs .'+$(this).attr('rel')).fadeIn('fast');
		
	});
	
	$('a.scroll').click(function(){
		
		href = $(this).attr('href').replace('#', '');
		
		$('html, body').animate({
			scrollTop: $('a[name="'+href+'"]').offset().top
		}, 1500);
		
		return false;
		
	});
	
	
});

/* 	Contato Functions
	Responsável por registrar um contato
	Uso genérico em todas as páginas
*/
var contatoAction = function(nome, email, telefone, celular, newsletter, mensagem){
	this.data = {};
	this.data.nome = nome;
	this.data.email = email;
	this.data.telefone = telefone;
	this.data.celular = celular;
	this.data.newsletter = newsletter;
	this.data.mensagem = mensagem;
	this.data.extras = [];
	this.data.meLigue = 0;
	
	this.data.ajaxResult = '';
	this.data.ajaxSucess = false;
	this.data.ajaxState = false;
}
contatoAction.prototype.addExtra = function(nome, sigla, texto, valor){
	this.data.extras.push({extra_nome:nome,extra_sigla:sigla,extra_texto:texto,extra_valor:valor});
	return this;
}
contatoAction.prototype.bindExtras = function(form){
	var extras = [];
	$(form).find('.form-extra').each(function(index, element) {
		extras.push({
			nome:$(element).attr('data-nome'),
			sigla:$(element).attr('data-sigla'),
			texto:$(element).val(),
			valor:$(element).attr('data-valor')});
    });
	for (i = 0; i < extras.length; i++) { 
		_item = extras[i];
		this.addExtra(_item.nome, _item.sigla, _item.texto, _item.valor); 
	}
	return this;
}
contatoAction.prototype.send = function(url, callback, form){
	dataurl = $.param(this.data);
	return $.getJSON( url+'?'+dataurl , function(data) {	
		eval(callback+'("'+form+'", data);');
		return data;  
	}).fail(function(data) {
   		eval('meLigueFormError("'+form+'", data);');
		return data;
  });
}
contatoAction.prototype.getStatus = function(url, callback){
	var args = arguments;
	$.getJSON( url , function(data) {
		eval(callback+'(args[2], data);');
		return data;  
	});
}
//
var meLigueFormStorage = {};
meLigueFormStorage.meLigueStatus = $( "#meLigueStatus" ).html();

var meLigueFormReset = function(){
	$('#meLigueFormSubmit').removeAttr('disabled').removeClass('disabled');
	$('#meLigueStatus').html( meLigueFormStorage.meLigueStatus );
}
var countdownInterval = '';
var countdown = function(seconds, e){
	window.clearInterval(countdownInterval);
	$(e).attr('countdown', 'started');
	$(e).html(seconds);
	countdownInterval = window.setInterval(function(){
		n = parseInt($(e).html());
		if( n<=0 ){
			window.clearInterval(countdownInterval);
			$(e).removeAttr('countdown');
			meLigueFormEtapa4();
			return false;
		}
		n = n-1;
		$(e).html(n);
		},1000);
}
var meLigueFormStatusAnimate = function(e, html){
	$( e ).animate({
		opacity: 0,
		marginTop: "-30px"
	  }, 500, function() {
		$(this).html( html )
		.animate({
			opacity: 1,
			marginTop: "0"
		  }, 500);
	  });
}
var meLigueFormStatus = function(n, e){
	switch(n){
		case 0:
			meLigueFormStatusAnimate(e, 'Registrando operação<br><div class="loading1">Por favor aguarde</div>');
			  break;
		
		case 1:
			meLigueFormStatusAnimate(e, '<span>Solicitação registrada!</span><br>Verificando a disponibilidade imediata de um consultor<br><div id="meLigueStatusSeconds"></div>');
			window.setTimeout(function(){countdown(45, '#meLigueStatusSeconds');},1000);
			break;
		
		case 2:
			meLigueFormStatusAnimate(e, '<i class="meLigueSucessIcon"></i>Consultor disponível!<br><strong><span>Em instantes seu telefone vai chamar</span></strong>');
			break;
		
		case 3:
			meLigueFormStatusAnimate(e, '<strong>Pedimos desculpas</strong> mas no momento não temos nenhum consultor disponível para te ligar de imediato. Mas não se preocupe, o mais breve possível iremos te ligar.');
			break;
			
		default:
			meLigueFormStatusAnimate(e, '<strong>Ops!</strong> Ocorreu algum erro ao registrar a sua solicitação. Verifique se os dados digitados estão corretos e tente novamente. Se não conseguir <a href="/contato">clique aqui</a>');
	}
}	
var contato = '';
var meLigueFormEtapa1 = function(f){
	//Validate form
	$(f).find('.submit-button').attr('disabled','disabled').addClass('disabled');
	meLigueFormStatus(0, "#meLigueStatus");
	//Init action
	celularDDD = $(f).find('.i-celular-ddd').val();
	celular = $(f).find('.i-celular').val();
	if( typeof celularDDD != 'undefined' && typeof celular != 'undefined' ){
		celular = '('+celularDDD+') '+celular;
	} else{celular = ''}
	newsletter = $(f).find('#newsletter').val();
	if(typeof newsletter == 'undefined'){newsletter = '';}
	contato = new contatoAction(
		$(f).find('.i-nome').val(), 
		$(f).find('.i-email').val(), 
		'('+$(f).find('.i-telefone-ddd').val()+') '+$(f).find('.i-telefone').val(), 
		celular, 
		newsletter, 
		null);
	contato.data.meLigue = 1;
	contato.bindExtras('#meLigueForm');
	send = contato.send(contatoServiceURL, 'meLigueFormEtapa2', f);
}
var meLigueFormEtapa2 = function(f, data){
	meLigueFormStatus(1, "#meLigueStatus");
	meLigueOperadorInterval = window.setInterval(function(){ contato.getStatus(contatoServiceStatusURL.replace('__ID__', data.id), 'meLigueVerificarDispOperador', f, data) }, 1000);
}
var meLigueFormEtapa3 = function(f, data){
	window.clearInterval(meLigueOperadorInterval);
	meLigueFormStatus(2, "#meLigueStatus");
}
var meLigueFormEtapa4 = function(){
	window.clearInterval(meLigueOperadorInterval);
	meLigueFormStatus(3, "#meLigueStatus");
}
var meLigueFormError = function(f, data){
	meLigueFormStatus(4, "#meLigueStatus");
	$('#meLigueFormSubmit').removeAttr('disabled').removeClass('disabled');
}
var meLigueVerificarDispOperador = function(f, data){
	if( parseInt(data.status)==1 ){
		meLigueFormEtapa3(f, data);
	}
}
/* 	Modal Contato MeLigue Bind Action */
$(document).ready(function(){
	$('.meligue-modal').click(function(e) {
        $('.i-produto-interesse').val($(this).attr('data-product'));
    });
	$('#meLigueForm').submit(function() {
		
		meLigueFormEtapa1('#'+$(this).attr('id'));
		return false;
			
	});
	$('#meLigueFormCancel').click(function(e) { meLigueFormReset(); });
});
/* Fim Contato Bind */
//test
//contato = new contatoAction('First Test', 'tiago@10mb.com.bra', '(61) 3049-1110', '(61) 8116-1395', 1, null);
//Globals
var getVal = function(v){
	if( v == 'undefined' || v == '' || typeof v == 'undefined' ){
		return '';
	} 
	return v;
}