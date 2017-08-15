//var plano1 = new Array("Mensal"=>13.90, "Anual"=>9.90, "Trianual"=>7.90);
var tipos = new Array();
tipos[1] = 'mensal';
tipos[12] = 'anual';
tipos[36] = 'trianual';
var plano = new Array();
plano[1] = new Array(13.90,34.90,84.90,149.90);
plano[12] = new Array(9.90,24.90,65.90,123.90);
plano[36] = new Array(6.90,16.90,37.90,72.90);

var planoInicial = 12;
var moeda = 'R$';

var alteraPlano = function(p){
	
	precos = plano[p];
	
	$('.planos .plano').each(function(index, element) {
        
		preco = precos[index];
		precoTotal = preco*p;
		precoTotalFormatado = number_format(precoTotal, 2, ',', '.');
		precoFormatado = number_format(preco, 2, ',', '.');
		precoFinal = moeda+' '+(precoFormatado.replace(/^(.+),(\d+)$/, "<span>$1</span>,$2"));
		$(this).find('.preco').html(precoFinal);
		
		$('.plano-details.plano'+(index+1)).find('.precoMensal').html(moeda+' '+precoFormatado);
		$('.plano-details.plano'+(index+1)).find('.precoTotal').html(moeda+' '+precoTotalFormatado);
		
    });
	
	$('.paymentType').html(tipos[p]);
	
}

$(document).ready(function(){
	
	alteraPlano(planoInicial);
	
	//$( "#tipoPagamento" ).buttonset();
	
	$('input[name="tipoPagamento"]').click(function(){
		
		tipo = $(this).attr('rel');
		alteraPlano(tipo);
		
	});
	
});