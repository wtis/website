new jsCidadesEstados({
  cidade: document.getElementById('i-contato-cidade'),
  estado: document.getElementById('i-contato-regiao'),

});

formContato.prototype.fabricaMethods = function(){
	this.formName = '#devsiteForm';
	this.slash = 'i-contato-';
	var that = this;	
	//Plataforma select
	//this.loadSelectByArray(this.modalidade, this.plataforma, formSelectPlataforma);
}
$(document).ready(function(){
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
	//Form
	contato1 = new formContato();
	contato1.fabricaMethods();
	contato1.bindSubmit();
});