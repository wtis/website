new jsCidadesEstados({
  cidade: document.getElementById('i-contato-cidade'),
  estado: document.getElementById('i-contato-regiao'),

})

formContato.prototype.contato1Form = function(){
	this.formName = '#eleicoesForm';
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
	
});

