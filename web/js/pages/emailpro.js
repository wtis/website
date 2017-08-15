var estimativa = function(){ //servidor, contas, dedicado, ppa
	this.servidor = 1; //1 = Compartilhado, 2 = Dedicado
	this.contas = 10;
	this.dedicado = new Number('249.90');
	this.ppa = new Number('4.90'); //Price Per Account
}
estimativa.prototype.calc = function(contas){
	price = new Number();
	if(parseInt(this.servidor)==2){
		price += this.dedicado;
	}
	contas = contas<10 ? 10 : contas;
	price += (contas*this.ppa);
	return price;
}
var estimativaClass = new estimativa();
$(document).ready(function(){
	
	$('.price-preview-input strong').html(number_format(estimativaClass.calc(1),2,',','.'));;
	
	$('#s-tipo-servidor').selectmenu({
		change: function( event, data ) {
			$('#s-tipo-servidor').change();
			estimativaClass.servidor = parseInt($(this).val());
			url = urlProduto[(estimativaClass.servidor-1)];
			$('#emailpro_contratar').attr('href', url);
			price = estimativaClass.calc( parseInt($('#s-contas-email').val()) );
			$('.price-preview-input strong').html(number_format(price,2,',','.'));
			return;
		}
	});
	
	$('#s-contas-email').change(function(e) {
        $('.price-preview-input strong').html(number_format(estimativaClass.calc($(this).val()),2,',','.'));;
    });
	$('#s-contas-email').keyup(function(){$('#s-contas-email').change();})
	
});