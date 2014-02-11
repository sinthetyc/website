// home image rotation
var	delay = 5000,
	current = 0,
	count = 0;

$(document).ready(function(){
	var slides = $('#slideshow').data('slides').split(','),
		slideTemplate = '<div class="slide" id="slide{id}" style="background-image:url(\'{img}\')"></div>';

	resizeSlideshow();
		
	for(var i = 0; i < slides.length; i++){
		$('#slideshow').append( slideTemplate.replace('{id}', i).replace('{img}', slides[i]) );
	}
	
	$(window).on('resize', resizeSlideshow);
	$(window).on('scroll', parallax);
	
	count = slides.length;
	setInterval(slide, delay);
});

function resizeSlideshow(){
	$('#slideshow').css({
		width: $(window).width(),
		height: $(window).height()
	});
}

function parallax(){
	$('.slide').each( function(){
		$(this).css('background-position', 'center ' + ($(window).scrollTop()/3) + 'px');	
	});
}

function slide(){
	$('#slide' + current).fadeOut(1000);
	current = current < count - 1 ? current + 1 : 0;
	$('#slide' + current).fadeIn(1000);
}