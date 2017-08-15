formContato.prototype.fabricaMethods = function(){
	this.formName = '#fabricaForm';
	this.modalidade = '#i-contato-modalidade';
	this.plataforma = '#i-contato-plataforma';
	this.slash = 'i-contato-';
	var that = this;	
	//Plataforma select
	this.loadSelectByArray(this.modalidade, this.plataforma, formSelectPlataforma);
}
$(document).ready(function(){
	//Form
	contato1 = new formContato();
	contato1.fabricaMethods();
	contato1.bindSubmit();
});