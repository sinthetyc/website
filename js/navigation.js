var crumbs = [],
	transition = false,
	fxFast = 100,
	fxMedium = 200,
	fxSlow = 300;

$(document).ready(function(){
	if(window.innerWidth > 820){
		//$('.subnav').css({display:'none'});
		//$('nav > ul > li').hover(function(){ $(this).children('.subnav').stop().show('slide', {direction:'left'}, 300); }, function(){$(this).children('.subnav').stop().hide('slide',{direction:'left'},300); });	
	}
	
	
	/* Buttons */
	$('body').on('click', 'button', function(e){
		crumbs.push({path:window.location.pathname});
		var url = $(this).attr('data:href');
		getPage(url, false);
	});
	
	window.onpopstate = function(e){
		getPage(crumbs[crumbs.length-1].path, true);
		crumbs.pop();
	};
	
	$('body').on('click', '.lightbox', function(e){
		e.preventDefault(); e.stopPropagation();
		
		if($('#cinemaView').length > 0){
			$('#cinemaView').remove();
		}
		
		$('#container').append('<div id="cinemaView"><div id="lightbox"><img id="slide"/></div></div>');
		
		$('#lightbox').center();
		$('#slide').attr('src', e.currentTarget.href).load(function(e){
			var width = e.target.width,
				height = e.target.height,
				left = (window.innerWidth / 2) - (width / 2),
				top = (window.innerHeight / 2) - (height / 2);
			$('#lightbox').animate({
				'left': left,
				'top': top,
				'width': width,
				'height': height
			}, fxSlow, function(e){
				$('#slide').animate({'opacity': 1}, fxSlow);
			});
		});
		
		return false;
	});
	
	$('body').on('click', '#cinemaView', function(e){
		if(e.target.id === "slide"){
			return false;
		}
		$('#cinemaView').fadeOut(fxSlow, function(){
			$(this).remove();
		});
	});
	
	window.onresize = function(e){
		$('#lightbox').center();
	};
	
	
});


function getPage(url, direction){
	
	if(transition) return false;
	
	transition = true;
	
	var hide = direction ? 'right' : 'left',
		show = direction ? 'left' : 'right';
	
	$('#pageHeader').after('<div id="nextpage" class="page left">');
	$.get(url, function(data){
		var pageData = $(data).find('#page').html(),
			pageTitle = $(data).find('title').html();
			
		history.pushState({}, "", url);
		
		$('#nextpage').html(pageData);
		$('#page').hide("slide", {direction: hide}, fxSlow, function(){
			$('#nextpage').show("slide", {direction: show}, fxSlow, function(){
				$('#page').remove();
				$('#nextpage').attr('id', 'page');
				transition = false;
			});
		});
	}).fail(function(){
		transition = false;
	});
}


(function ($) {
	$.fn.center = function () {
		this.css({
			position: 'absolute',
			top: (($(window).height() - this.height()) / 2) + $(window).scrollTop()-10,
			left: (($(window).width() - this.width()) / 2)
		});
		return this;
	};
})( jQuery );