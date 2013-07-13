var crumbs = [],
	origPop = true,
	transition = false,
	fxFast = 100,
	fxMedium = 200,
	fxSlow = 300,
	page = 1,
	xhr = null;

$(document).ready(function(){

	/* navigate */
	$('body').on('click', '.photolink, nav a, .iconset .email', function(e){
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
	}).on('mouseover', '#slide, #metadata', function(){
		$('#metadata').stop().animate({ 'opacity': 1 }, fxSlow);
	}).on('mouseout', '#slide, #metadata', function(){
		$('#metadata').stop().animate({ 'opacity': 0 }, fxSlow);
	});
	

	/* lightbox */
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
		console.log(e);
		if(e.target.id === "slide" || e.target.id === "metadata" || e.target.className.match(/(next|prev)/)){
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
	
	window.onresize = function(e){
		$('#lightbox').center();
	};
	
});

/*
function lazyLoad(){
	var url = '';

	$('#load').addClass('loading');
	if(flickr){
		page += 1;
		//url = '/inc/lazyloader-flickr.php?photoset=' + photoset + '&page=' + page;
		flickrLazyLoad();
	} else {
		photoStart += 4;
		photoEnd = photoStart + 4;
		url = '/inc/lazyloader.php?s=' + photoStart + '&e=' + photoEnd + '&f=' + photofile;
		$.get(url, function(data){
			$('#load').before(data);
			$('#load').removeClass('loading');
			if(data.match(/<!-- eof -->/)){
				$('.more').fadeOut(fxSlow);
			}
		});
	}
}
*/

function flickrLazyLoad(){
	var photos = {};
	//$('document').ready( function(){
		$.getJSON('/inc/lazyloader-flickr.php?func=getPhotoSet&photoset=' + photoset, function(data){
			photos = data["photos"];
			
			for(var p in photos){
				var photo = photos[p],
					imageHTML = '<div class="col grid2 left"><a href="' + photo.image + '" class="lightbox"><img src="' + photo.thumb + '" alt="' + photo.title + '" title="'  + photo.title +  '"data-id="' + photo.id + '" data-secret="' + photo.secret + '"><span class="seemore zoom">Zoom</span></a></div>';
				$('#page').append(imageHTML);
			}
		});
	//});
}


function flickrEXIFData(id, secret){
	$.get('/inc/lazyloader-flickr.php?func=getPhotoEXIF&photoid=' + id + '&secret=' + secret, function(data){
		$('#metadata').html(data);
	});
}


function getPage(url, direction){
	
	if(url === 'undefined') return false;
	
	var hide = direction ? 'down' : 'up',
		show = direction ? 'up' : 'down',
		cinemaViewHTML = '<div id="cinemaView" class="loading"></div>';
	
	if(xhr !== null){
		xhr.abort();
		xhr = null;
	}
	
	if(document.getElementById('cinemaView') === null){
		$('body').append(cinemaViewHTML);
	}
	
	$('#pageHeader').after('<div id="nextpage" class="page left">');
	xhr = $.get(url, function(data){
		if(!direction) crumbs.push({path:window.location.pathname});
		
		var pageData = $(data).find('#page').html(),
			pageTitle = $(data).filter('title').text();
		
		if(origPop) origPop = !origPop;
		history.pushState({}, "", url);
		document.title = pageTitle;
		
		$('#cinemaView').remove();
		
		$('#nextpage').html(pageData);
		$('#page').hide("slide", {direction: hide}, fxSlow, function(){
			$('#nextpage').show("slide", {direction: show}, fxSlow, function(){
				$('#page').remove();
				$('#nextpage').attr('id', 'page');
				transition = false;
			});
		});
	}).fail(function(){
		xhr = null;
		console.log('Under Construction');
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
	
	var title = el.children[0].getAttribute('title'),
		id = el.children[0].dataset.id,
		secret = el.children[0].dataset.secret;
		
	$('.current').removeClass('current');
	$(el).addClass('current');
	
	var codebox = (el.href.match(/.html/ig) || []).length === 1,
		cinemaViewHTML = codebox ? '<div id="cinemaView"><div id="lightbox"><span class="prev">&nbsp;</span><iframe id="slide" frameborder="0" scrolling="no"></iframe><div id="metadata"></div><span class="next">&nbsp;</span></div></div>' : '<div id="cinemaView"><div id="lightbox"><span class="prev">&nbsp;</span><img id="slide"/><div id="metadata"></div><span class="next">&nbsp;</span></div></div>';
	
	if($('#cinemaView').length < 1){
		$('body').append(cinemaViewHTML);
		$('#lightbox').center();
		$('#cinemaView').center();
		offsetLeft = document.getElementById('lightbox').offsetLeft;
		first = true;
	} else {
		offsetLeft = target === "next" ? -window.innerWidth - document.getElementById('lightbox').offsetLeft : window.innerWidth + document.getElementById('lightbox').offsetLeft;
	}
	
	$('#lightbox').animate({'left': offsetLeft}, fxSlow, function(){
		$('#cinemaView').addClass('loading');
		
		$('#metadata').html('<p>Loading...</p>');
		flickrEXIFData(id,secret);
		
		$(this).css({'left': first ? offsetLeft : -offsetLeft});
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
				$('#slide, .prev, .next', '#lightbox').animate({'opacity': 1}, fxSlow);
			});
		});
	})

	
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