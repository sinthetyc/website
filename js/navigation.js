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
	
	
	/* navigate */
	$('body').on('click', '.photolink', function(e){
		e.stopPropagation();
		e.preventDefault();
		
		crumbs.push({path:window.location.pathname});
		var url = $(this).attr('href');
		
		getPage(url, false);
		
		return false;
	});

	window.onpopstate = function(e){
		getPage(crumbs[crumbs.length-1].path, true);
		crumbs.pop();
	};

	
	/* seemore */
	$('body').on('mouseover', '.photolink', function(){
		$(this).children('.seemore').stop().fadeIn();
	}).on('mouseout', '.photolink', function(){
		$(this).children('.seemore').stop().fadeOut();
	});
	

	/* lightbox for photos */
	$('body').on('click', '.lightbox', function(e){
		e.stopPropagation();
		e.preventDefault();
		
		loadSlide(e.target.parentElement);
		
		return false;
	}).on('click', '#slide', function(e){
		var x = e.clientX - e.target.offsetParent.offsetLeft,
			y = e.clientY - e.target.offsetParent.offsetTop,
			w = e.target.width;
			
		if(x > w/2){
			//next
			var el = $('.current').parent('.col').next('.col').children('.lightbox');
			el = el.length > 0 ? el[0] : $('.lightbox')[0];
			if(el)
				loadSlide(el);
		} else {
			//previous
			var el = $('.current').parent('.col').prev('.col').children('.lightbox');
			el = el.length > 0 ? el[0] : $('.lightbox')[$('.lightbox').length-1];
			if(el)
				loadSlide(el);
		}
	}).on('click', '#cinemaView', function(e){
		if(e.target.id === "slide"){
			return false;
		}
		$('#cinemaView').fadeOut(fxSlow, function(){
			$('.current').removeClass('current');
			$(this).remove();
		});
	});

	
/* TODO: Codebox for JS demos */
	
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

function loadSlide(target){

	$('.current').removeClass('current');
	
	$(target).addClass('current');
	
	if($('#cinemaView').length < 1){
		$('#container').append('<div id="cinemaView"><div id="lightbox"><img id="slide"/></div></div>');
	}
	
	$('#lightbox').center();
	
	$('#slide').animate({'opacity': 0}, fxFast, function(){
	
		$('#lightbox').addClass('loading');
		
		$(this).attr('src', target.href).load( function(e){
			var width = e.target.width,
				height = e.target.height,
				left = (window.innerWidth / 2) - (width / 2),
				top = (window.innerHeight / 2) - (height / 2);
			$('#lightbox').animate({
				'left': left,
				'top': top,
				'width': width,
				'height': height
			}, fxSlow, function(){
				$('#lightbox').removeClass('loading');
				$('#slide').animate({'opacity': 1}, fxSlow);
			});
		});
		
	});
}


(function ($) {
	$.fn.center = function(){
		this.css({
			position: 'absolute',
			top: (($(window).height() - this.height()) / 2) + $(window).scrollTop()-10,
			left: (($(window).width() - this.width()) / 2)
		});
		return this;
	};
})( jQuery );