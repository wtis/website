new jsCidadesEstados({
  cidade: document.getElementById('i-contato-cidade'),
  estado: document.getElementById('i-contato-regiao'),

})
new jsCidadesEstados({
  cidade: document.getElementById('disp-cidade'),
  estado: document.getElementById('disp-regiao'),

})

formContato.prototype.contato1Form = function(){
	this.formName = '#contato1Form';
	this.slash = 'i-contato-';
	var that = this;	
}
$(document).ready(function(){
	//Form
	contato1 = new formContato();
	contato1.contato1Form();
	contato1.bindSubmit();
	
	$('#i-contato-regiao').selectmenu({
		change: function( event, data ) {
		$('#i-contato-regiao').change();
		$('#i-contato-cidade').removeAttr('disabled');
		$('#i-contato-cidade').selectmenu('refresh');
		return;
		}
	});
	$('#i-contato-cidade').selectmenu({
		change: function( event, data ) {
		if(data.item.value.length<=0){ return; }
		return;
		}
	});
	
	$('#disp-regiao').selectmenu({
		change: function( event, data ) {
		$('#disp-regiao').change();
		$('#disp-cidade').selectmenu('refresh');
		return;
		}
	});
	$('#disp-cidade').selectmenu({
		change: function( event, data ) {
		if(data.item.value.length<=0){ return; }
		partner = new Partners(data);
		//partner.init();
		return;
		}
	});
	
});

var Partners = function(data){
	this.divList = '#partner-list';
	this.callbackSuscess = 'partner.sucess';
	this.callbackError = 'partner.error';
	this.template = $('#partner-list-template').html();
	this.init(data, this.callbackSuscess, this.callbackError);
	this.status = [
	"Representante <strong>credenciado</strong><br />Profissionais em treinamento",	
	"Representante <strong>credenciado</strong><br />Disponibilidade imediata de profissionais",
	"<strong>Agência Filial</strong><br>Disponibilidade imediata de profissionais"
	]
}
Partners.prototype.init = function(data, callbackSucess, callbackError){
	var that = this;
	var args = arguments;
	params = {}
	params.servico = services.pswID;
	params.cidade = data.item.value;
	params.uf = $('#i-contato-regiao').val();
	params = $.param(params);
	$(this.divList).addClass('loading').html('');
	$.getJSON( services.partner+'?'+params , function(data) {	
		eval(callbackSucess+'(data, args);');
		return data;  
	}).fail(function(data) {
		eval(callbackError+'(data, args);');
		return data;
	});
}
Partners.prototype.sucess = function(data, args){
	$(this.divList).removeClass('loading');
	layout = '';
	if( data.length<= 0 ){
		this.error(data);
		return;
	}
	for(i=0;i<data.length;i++){
		model = this.template.replace('{NOME}', data[i].nome);
		model = model.replace('{ENDERECO}', data[i].enderecoCompleto);
		model = model.replace('{CIDADE}', data[i].cidade);
		model = model.replace('{UF}', data[i].uf);
		model = model.replace('{STATUS}', this.status[data[i].status]);
		model = model.replace('{URL}', (services.partnerOpen.replace('__ID__', data[i].slug)));
		layout += model;
	}
	$(this.divList).html('<ul>'+layout+'</ul>');
}
Partners.prototype.error = function(data, args){
	$(this.divList).html('<div class="error"><strong>Infelizmente não temos disponibilidade imediata para alocação de profissionais na cidade informada.</strong><br>Fale com um dos nossos atendentes para que possamos entender a sua necessidade e talvez possamos providenciar o profissional o mais breve possível<br><br><a href="#meligue" data-toggle="modal" data-target="#meLigueModal" data-product="Professional Services" class="button10 cinza">Nós ligamos para você<i></i></a> &nbsp; <a href="#chat" class="button10 verde init-chat">Fale conosco via chat<i></i></a></div>');
}