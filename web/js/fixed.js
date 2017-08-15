if (typeof scrollReveal == 'function') { window.sr = new scrollReveal(); };

var appInit = function(){
	$('.init-chat').click(function(e) {
		produto = $(this).attr('data-product');
		if( typeof produto != 'undefined' && produto != '' ){
			msg = 'Olá, gostaria de saber mais sobre '+produto;
		} else{
			msg = '.';
		}
        //$zopim.livechat.say(msg);
        //Tawk_API.maximize();
        Intercom('showNewMessage', msg);
    });
}

$(document).ready(function(){
	
	appInit();
	
    /*$(window).scroll(function () {
        var windowScroll =  $(window).scrollTop();
		var windowHeight = $(window).height();
		if (windowScroll > 0) {
			$('.scroll-top').fadeIn();
		} else {
			$('.scroll-top').fadeOut();
		}
    });
    $('.scroll-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
    });*/
	
	if (typeof $( ".sm" ).selectmenu == 'function') { $( ".sm" ).selectmenu(); };
	if (typeof $( ".tt" ).tooltip == 'function') { $( ".tt" ).tooltip(); };
	if (typeof $( ".tip" ).tipTip == 'function') { $(".tip").tipTip({maxWidth: "auto", delay: 0, defaultPosition: 'top'}); };
	if (typeof $('.fullscreen').parallax == 'function') { $('.fullscreen').parallax("50%", 0.1); };
	
	$('.mais-telefones').click(function(e) {
        $('#maisTelefonesModal').modal('show');
    });
	
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
	
	$('.i-telefone-ddd').keyup(function(e) {
        if( parseInt($(this).val().length)>=2 ){
			$(this).parent().find('.i-telefone').focus();
		}
    });
	
	var SPMaskBehavior2 = function (val) {
	  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions2 = {
	  onKeyPress: function(val, e, field, options) {
		  field.mask(SPMaskBehavior2.apply({}, arguments), options);
		}
	};
	$('.phoneMask').mask(SPMaskBehavior2, spOptions2);
	
  	$('[data-toggle="popover"]').popover();
	
	$('#defaultModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var url = button.data('whatever') 
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this);
	  modal.find('.modal-title').text(button.data('title'));
	  modal.find('.modal-body').html('Aguarde...').load(url+'?field=descricaoHtml');
	})
	
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
	
	$('.menu ul.menu1 > li').click(function(){
		console.log($('.navbutton:visible'));
		if( $('.navbutton').is(":visible") ){
			$(this).find('div[class="hover"]').stop().slideToggle('fast');
		} else{}
	});
	$('.menu ul.menu1 > li').hover(function(){
		if( $('.navbutton').is(":visible") ){
			
		} else{
			$(this).find('div[class="hover"]').stop().slideToggle('fast');
		}
		},function(){
			if( $('.navbutton').is(":visible") ){
				
			} else{
				$(this).find('div[class="hover"]').hide();
			}
		})
	
	$('.navbutton').click(function(e) {
        $('.menu ul.menu1').stop().slideToggle();
    });
	
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
			scrollTop: $('a[name="'+href+'"], section[id="'+href+'"]').offset().top
		}, 1000);
		
		return false;
		
	});
	
	
});

/* 	Contato Functions
	Responsável por registrar um contato
	Uso genérico em todas as páginas
*/
var contatoAction = function(data){
	this.data = {};
	this.dataStr = data;
	this.data.extras = [];
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
contatoAction.prototype.send = function(url, callbackSucess, callbackError){
	dataurl = $.param(this.data);
	var args = arguments;
	return $.getJSON( url+'?'+this.dataStr+'&'+dataurl , function(data) {	
		eval(callbackSucess+'(data, args);');
		return data;  
	}).fail(function(data) {
		if(typeof callbackError != 'undefined'){
   			eval(callbackError+'(data, args);');
		}
		return data;
  });
}
contatoAction.prototype.getStatus = function(url, callbackSucess, callbackError){
	var args = arguments;
	$.getJSON( url , function(data) {
		eval(callbackSucess+'(data, args);');
		return data;  
	}).fail(function(data) {
   		if(typeof callbackError != 'undefined'){
			if(callbackError != null){
   				eval(callbackError+'(data, args);');
			}
		}
		return data;
  });
}
//


/* 	MeLigue Functions
	Responsável por registrar um contato MeLigue
	Uso genérico em todas as páginas
	new MeLigue();
*/
var meLigue = function(){
	this.formName = '#meLigueForm';
	this.submitButton = '#meLigueFormSubmit';
	this.cancelButton = '#meLigueFormSubmit';
	this.divStatus = '#meLigueStatus';
	this.divStatusTimer = '#meLigueStatusSeconds';
	this.formStorage = {}
	this.formStorage.meLigueStatus = $( this.divStatus ).html();
	this.countdownInterval = null;
	this.slash = 'i-meligue-';
	this.contato = null;
	this.meLigueOperadorInterval = null;
	this.countdownInterval = null;
	this.countDownTime = 45;
	this.error = false;
	
	var that = this;
	
	//Bind
	$(this.formName).submit(function() {		
		that.init();
		return false;			
	});
	$(this.cancelButton).click(function(e) { that.meLigueFormReset(); });
}
meLigue.prototype.meLigueFormReset = function(){
	$(this.submitButton).removeAttr('disabled').removeClass('disabled');
	$(this.divStatus).html( this.formStorage.meLigueStatus );
}
meLigue.prototype.countdown = function(seconds, e){
	window.clearInterval(this.countdownInterval);
	var that = this;
	$(e).attr('countdown', 'started');
	$(e).html(seconds);
	this.countdownInterval = window.setInterval(function(){
		n = parseInt($(e).html());
		if( n<=0 ){
			window.clearInterval(this.countdownInterval);
			$(e).removeAttr('countdown');
			that.meLigueFormEtapa(null, null, 3);
			return false;
		}
		n = n-1;
		$(e).html(n);
		},1000);
}
meLigue.prototype.meLigueFormStatusAnimate = function(e, html){
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
meLigue.prototype.meLigueFormStatus = function(n){
	var that = this;
	switch(n){
		case 0:
			this.meLigueFormStatusAnimate(this.divStatus, 'Registrando operação<br><div class="loading1">Por favor aguarde</div>');
			break;		
		case 1:
			this.meLigueFormStatusAnimate(this.divStatus, '<span>Solicitação registrada!</span><br>Verificando a disponibilidade imediata de um consultor, por favor espere.<br><div id="meLigueStatusSeconds"></div>');
			window.setTimeout(function(){that.countdown(that.countDownTime, that.divStatusTimer);},1000);
			break;		
		case 2:
			this.meLigueFormStatusAnimate(this.divStatus, '<i class="meLigueSucessIcon"></i>Consultor disponível!<br><strong><span>Em instantes seu telefone vai chamar</span></strong>');
			break;		
		case 3:
			this.meLigueFormStatusAnimate(this.divStatus, '<strong>Pedimos desculpas</strong> mas no momento não temos nenhum consultor disponível para te ligar de imediato. Não se preocupe, o mais breve possível iremos te ligar.');
			break;			
		default:
			this.meLigueFormStatusAnimate(this.divStatus, '<strong>Ops!</strong> Ocorreu algum erro ao registrar a sua solicitação. Verifique se os dados digitados estão corretos e tente novamente. Se não conseguir <a href="/contato">clique aqui</a>');
	}
}	
meLigue.prototype.init = function(){
	var that = this;
	$(this.formName).find(this.submitButton).attr('disabled','disabled').addClass('disabled');
	this.meLigueFormStatus(0);
	//Init action
	regex = new RegExp(this.slash, 'g');
	this.contato = new contatoAction($(this.formName).serialize().replace(regex, '')); //
	this.contato.bindExtras(this.formName);
	this.contato.send(contatoServiceURL, 'meligueAction.meLigueFormEtapa', 'meligueAction.meLigueFormError', [1,this]);
}
meLigue.prototype.meLigueFormEtapa = function(data, args, n){ //Receiver (data, args)
	var that = this;
	if( typeof n == 'undefined' ){
		console.log('Passou');
		if(this.error){	n = 4; } else{ n = args[(args.length-1)]; n = n[0]; }
	}
	switch(n){
		case 1:
			this.meLigueFormStatus(1, this.divStatus);
			this.meLigueOperadorInterval = window.setInterval(function(){ that.contato.getStatus(contatoServiceStatusURL.replace('__ID__', data.id), 'meligueAction.meLigueVerificarDispOperador', null, that) }, 1000);
			break;
		case 2:
			window.clearInterval(this.meLigueOperadorInterval);
			this.meLigueFormStatus(2, this.divStatus);
			break;
		case 3:
			window.clearInterval(this.meLigueOperadorInterval);
			this.meLigueFormStatus(3, this.divStatus);
			break;
		default:
			this.meLigueFormStatus(4, this.divStatus);
			$(this.submitButton).removeAttr('disabled').removeClass('disabled');
	}
}
meLigue.prototype.meLigueFormError = function(data, args, n){
	this.meLigueFormEtapa(null, null, 4);
}
meLigue.prototype.meLigueVerificarDispOperador = function(data, args, n){
	if( parseInt(data.status)==1 ){
		this.meLigueFormEtapa(data, args, 2);
	}
}
/* 	Modal Contato MeLigue Bind Action */
var meligueAction = '';
$(document).ready(function(){
	$('.meligue-modal, .meligue').click(function(e) {
        $('.i-produto-interesse').val($(this).attr('data-product'));
    });	
	meligueAction = new meLigue();		
});
/* Fim Contato Bind */


var formContato = function(){
	this.callbackSucess = 'contatoSucess';
	this.callbackError = 'contatoError';
	this.functionPreload = 'contatoPreload';
	this.sucessMessage = '<strong>Sua solicitação foi registrada com sucesso!</strong><br>Faremos contato o mais breve possível';
	this.errorMessage = 'Ocorreu algum erro ao registrar a sua solicitação<br>Tente novamente por favor.';
	this.preloadMessage = '<i class="loading1 l4" data-sr="enter top please, and hustle 200px wait 2.0s"></i>Aguarde enquanto nossos scripts trabalham';
}
formContato.prototype.loadSelectByArray = function(select1, select2, array1){
	var that = this;
	$(select1).selectmenu({
      change: function( event, data ) {
		p = array1[data.item.label];
		preserve = $(select2+' option:first').html();
		$(select2).attr('disabled', 'disabled');
		$(select2).empty().append('<option value="0">'+preserve+'</option>');
		if( typeof p != 'undefined' ){
			for(i=0;i<p.length;i++){
				$(select2).append('<option>'+p[i]+'</option>');
			}
			$(select2).removeAttr('disabled');
		}
		$(select2).selectmenu('refresh');
		return;
		}
     });	
}
formContato.prototype.bindSubmit = function(){
	var that = this;
	$(this.formName).submit(function(e) {
		that.send();
		return false;
    });
}
formContato.prototype.send = function(){
	this.contatoPreload();
	$(this.formName).find('.submit-button').attr('disabled','disabled');
	//if (typeof eval(this.functionPreload) == 'function') { eval(this.functionPreload+'(this)') }
	regex = new RegExp(this.slash, 'g');
	this.contato = new contatoAction($(this.formName).serialize().replace(regex, '')); //
	this.contato.bindExtras(this.formName);
	this.contato.send(contatoServiceURL, this.callbackSucess, this.callbackError, this);
	return false;
}
formContato.prototype.contatoPreload = function(){
	preload = $(this.formName).parent().find('.preload .preload-div').html(this.preloadMessage);
	preload.parent().fadeIn('fast');
}
var contatoSucess = function(data, args){
	instance = args[(args.length-1)];
	preload = $(instance.formName).parent().find('.preload .preload-div').html(instance.sucessMessage);
}
var contatoError = function(data, args){
	instance = args[(args.length-1)];
	preload = $(instance.formName).parent().find('.preload .preload-div').html(instance.errorMessage);
	$(instance.formName).find('.submit-button').removeAttr('disabled');
	window.setTimeout(function(){$(instance.formName).parent().find('.preload').fadeOut('slow');}, 4000);
}