var crumbs = [],
	origPop = true,
	transition = false,
	fxFast = 100,
	fxMedium = 200,
	fxSlow = 300;

$(document).ready(function(){
	//if(window.innerWidth > 820){
	//	$('.subnav').css({display:'none'});
	//	$('nav > ul > li').hover(function(){ $(this).children('.subnav').stop().show('slide', {direction:'left'}, 300); }, function(){$(this).children('.subnav').stop().hide('slide',{direction:'left'},300); });	
	//}
	
	
	/* navigate */
	$('body').on('click', '.photolink', function(e){
		e.stopPropagation();
		e.preventDefault();

		getPage($(this).attr('href'), false);
		
		return false;
	});

	window.onpopstate = function(e){
		if(origPop) return false;
		if(typeof crumbs[crumbs.length-1] === 'undefined'){
			history.back();
		} else {
			getPage(crumbs[crumbs.length-1].path, true);
			crumbs.pop();
		}
	};

	
	/* seemore */
	$('body').on('mouseenter', '.photolink, .lightbox', function(){
		$(this).children('.seemore').stop().fadeIn();
	}).on('mouseleave', '.photolink, .lightbox', function(){
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
			loadSlide("next");
		} else {
			loadSlide("prev");
		}
	}).on('click', '#cinemaView', function(e){
		if(e.target.id === "slide" || e.target.className.match(/(next|prev)/)){
			return false;
		}
		closeCinemaView();
	}).on('keyup', function(e){
		if($('#cinemaView').length > 0){
			switch(e.which){
				case 37:
					loadSlide("prev");
					break;
				case 39:
					loadSlide("next");
					break
				case 27:
					closeCinemaView();
					break;
				default:
					console.log(e.which);
			}
		}
	}).on('click', '#lightbox .next', function(){
		loadSlide("next");
	}).on('click', '#lightbox .prev', function(){
		loadSlide("prev");
	});
	
/* TODO: Codebox for JS demos */
	
	window.onresize = function(e){
		$('#lightbox').center();
	};
	
	
	$('body').on('click', '#load > .more', function(e){
		photoStart += 4;
		photoEnd += 4;
		$.get('/inc/lazyloader.php?s=' + photoStart + '&e=' + photoEnd + '&f=' + photofile, function(data){
			$('#load').before(data);
			if(data.match(/<!-- eof -->/)){
				$('.more').fadeOut(fxSlow);
			}
		});
	});
	
	
	$(window).on('scroll', function(e){
		/*
		if( $(window).scrollTop() == $(document).height() - $(window).height() ){
			$.get('/inc/lazyloader.php?s=1&e=4&f=../photography/wildlife/photos.csv', function(data){
				$('#page').append(data);
			});
		}
		*/
	});
	
	
});


function getPage(url, direction){
	
	if(transition || url === 'undefined') return false;
	
	transition = true;
	
	var hide = direction ? 'right' : 'left',
		show = direction ? 'left' : 'right';
	
	$('#pageHeader').after('<div id="nextpage" class="page left">');
	$.get(url, function(data){
		if(!direction) crumbs.push({path:window.location.pathname});
		
		var pageData = $(data).find('#page').html(),
			pageTitle = $(data).find('title').html();
		
		if(origPop) origPop = !origPop;
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
	var el = {},
		offsetLeft = 0,
		first = false;
	
	switch(target){
		case "next":
			el = $('.current').parent('.col').next('.col').children('.lightbox');
			el = el.length > 0 ? el[0] : $('.lightbox')[0];
		break;
		case "prev":
			el = $('.current').parent('.col').prev('.col').children('.lightbox');
			el = el.length > 0 ? el[0] : $('.lightbox')[$('.lightbox').length-1];
		break;
		default:
			el = target;
	}

	$('.current').removeClass('current');
	$(el).addClass('current');
	
	var codebox = (el.href.match(/.html/ig) || []).length === 1,
		cinemaViewHTML = codebox ? '<div id="cinemaView"><div id="lightbox"><span class="prev">&nbsp;</span><iframe id="slide"></iframe><span class="next">&nbsp;</span></div></div>' : '<div id="cinemaView"><div id="lightbox"><span class="prev">&nbsp;</span><img id="slide"/><span class="next">&nbsp;</span></div></div>';
	
	if($('#cinemaView').length < 1){
		$('body').append(cinemaViewHTML);
		$('#lightbox').center();
		$('#cinemaView').center();
		offsetLeft = document.getElementById('lightbox').offsetLeft;
		first = true;
	} else {
		offsetLeft = target === "next" ? -window.innerWidth + document.getElementById('lightbox').offsetLeft : window.innerWidth + document.getElementById('lightbox').offsetLeft;
	}
	
	$('#lightbox').animate({'left': offsetLeft}, fxSlow, function(){
		$('#cinemaView').addClass('loading');
		$(this).css({'left': first ? offsetLeft : -offsetLeft}).addClass('loading');
		$('#slide').attr('src', el.href).on('load', function(e){
			var width = (codebox ? e.target.offsetWidth : e.target.width) + 80,
				height = (codebox ? e.target.offsetHeight : e.target.height),
				left = (window.innerWidth / 2) - (width / 2),
				top = (window.innerHeight / 2) - (height / 2);
				
			$('#cinemaView').removeClass('loading');
			$('#lightbox').animate({
				'left': left,
				'top': top,
				'width': width,
				'height': height
			}, fxSlow, function(){
				if(first)
					$('#slide, .prev, .next', '#lightbox').animate({'opacity': 1}, fxSlow);
			});
		});
	});

	
}

function closeCinemaView(){
	$('#cinemaView').fadeOut(fxSlow, function(){
		$('.current').removeClass('current');
		$(this).remove();
	});
}

(function ($) {
	$.fn.center = function(){
		this.css({
			top: (($(window).height() - this.height()) / 2),
			left: (($(window).width() - this.width()) / 2)
		});
		return this;
	};
})( jQuery );