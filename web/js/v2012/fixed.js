$(document).ready(function(){
	
	$('#full_menu ul.menu > li').hover(function(){$(this).find('div[rel="hover"]').fadeIn('fast')},function(){$(this).find('div[rel="hover"]').hide()})
	
	$('.table-func ul.options li').click(function(){
		
		if( $(this).hasClass('disabled') ){
			return false;
		}
		
		$(this).parent().find('li').each(function(index){
			$(this).removeClass('active');
		});
		
		$(this).addClass('active');
		$(this).parent().parent().find('.content > div').each(function(){
			$(this).fadeOut('fast');
		});
		$(this).parent().parent().find('.content #content'+($(this).index()+1)).fadeIn('fast');
		
	});
	//tipTip
	$(".tip").tipTip({maxWidth: "auto", delay: 0, defaultPosition: 'top'});
	
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