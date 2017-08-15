$(document).ready(function(){
	$('.casu-options li a').click(function(e) {
        $(this).parent().parent().find('li.selected').removeClass('selected');
		$(this).parent().addClass('selected');
		$('.casu-item.selected').removeClass('selected');
		$('.casu-item').eq($(this).parent().index()).addClass('selected');
		return false;
    });
});