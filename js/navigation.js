$(document).ready(function(){

	var fxFast = 100,
		fxMedium = 200,
		fxSlow = 300;

	$('.subnav').css({'display':'block'});
	$('.subnav').each(function(){
		var left = $(this).parent('li').offset().left + $(this).parent('li').width() / 2,
			subWidth = 0;
		
		$(this).children('li').each(function(){
			subWidth += $(this).width() / 2;
		});
		
		$(this).children('li').each(function(){
			$(this).css({ 'left' : left - subWidth });
		});
	}).css({'display':'none'});
	
	

	/* Navigation */
	$('nav > ul > li').hover(function(){
		if($(this).children('.subnav').length > 0){
			$(this).children('a').addClass('hover');
			$(this).children('.subnav').stop().show( "slide", { direction: 'up' }, fxSlow );
		}
	}, function(){
		if($(this).children('.subnav').length > 0){
			$(this).children('a').removeClass('hover');
			$(this).children('.subnav').stop().hide( "slide", { direction: 'up' }, fxSlow );
		}
	});

	
	/* Buttons */
	
	$('body').on('click', 'button', function(e){
		var page = $(this).attr('data:href');
	
		$('#container').prepend('<div id="nextpage" class="page left">');
		$.get(page, function(data){
			var pageData = $(data).find('#page').html(),
				pageTitle = $(data).find('title').html();
				
			history.pushState({}, pageTitle, page);
			
			$('#nextpage').html(pageData);
			$('#page').hide("slide", {direction: 'left'}, fxSlow, function(){
				$('#nextpage').show("slide", {direction: 'right'}, fxSlow, function(){
					$('#page').remove();
					$('#nextpage').attr('id', 'page');
				});
			});
		});
	
	});
	
	window.onpopstate = function(e){
		console.log(e);
	};
	
});