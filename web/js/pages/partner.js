formContato.prototype.partnerForm = function(){
	this.formName = '#partnerForm';
	this.slash = 'i-contato-';
	var that = this;	
}
$(document).ready(function(){
	//Form
	contato1 = new formContato();
	contato1.partnerForm();
	contato1.bindSubmit();
});