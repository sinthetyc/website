/*
 *	TristanBrehaut.com AKA Pixel Monkey.

	------------------------------------------------------------------------------------------------------------------------------ 
	
	(                         *                                   
	 )\ )               (    (  `                   )              
	(()/( (      )   (  )\   )\))(               ( /(    (   (     
	 /(_)))\  ( /(  ))\((_) ((_)()\   (    (     )\())  ))\  )\ )  
	(_)) ((_) )\())/((_)_   (_()((_)  )\   )\ ) ((_)\  /((_)(()/(  
	| _ \ (_)((_)\(_)) | |  |  \/  | ((_) _(_/( | |(_)(_))   )(_)) 
	|  _/ | |\ \ // -_)| |  | |\/| |/ _ \| ' \))| / / / -_) | || | 
	|_|   |_|/_\_\\___||_|  |_|  |_|\___/|_||_| |_\_\ \___|  \_, | 
															 |__/  

	------------------------------------------------------------------------------------------------------------------------------
 
	The story so far...
 
	As a professional code spelunker with an undeniable penchant for exploring the places behind the veil of the everyday internet
	you decide to venture forth into the gloomy domain of the Javascript King, Pixel Monkey.
	
	Choose your character:
		a.	Code Knight		-	The Code Knight is lion-hearted, never afraid to take a side in a battle and always
								on the lookout for a maiden in distress. Code comes and goes, but the kingdom remains
								the same. Built like a brick shit-house you are always armed with a quick, tacticle
								wit-blade and the enchanted shield of HTML5.
		
		b.	Code Wizard		-	As a Code Wizard, a practitioner of the hidden arts, you have chosen a life of magic study.
								Google.com is your magic tome and codepen.com your alchemical laboratory.  With a keen
								mind the underlying weakness of any challenge is quickly discovered and exploited to your benefit.
		
		c.	Code Priest		-	Gentle by nature but able to call forth the vast, assertive powers of console.log() to
								banish even the most ephemeral of bugs standing in the way of a peacefull existence.  As a Code
								Priest you always have your console staff at hand and you have spent many years learning
								to decipher some of the more esoteric signs of the internet.

	Note:	As you read, some storyline and decisions will be based around your class.  When you see this magic symbol ( c? ) please
			read the string with your corresponding class key.  I.E. K - Knight, W - Wizzard, P - Priest.
								
	Inventory: You are carrying...
*/

var crumbs = [],				// A bag of golden crumbs, because even the most experienced traveller knows that sometimes you need help to retrace your steps.
	origPop = true,				// A small spell to protect the contents of your bread crumb bag because theives are always looking for a quick buck.
	transition = false,			// A transition detector, so as not to get caught in any kinetic traps.
	fxFast = 100,				// A fast effect modifier (Light).  These can be cast as a buff on other spells and powers to speed them up, or slow them down.
	fxMedium = 200,				// A medium effect modifier (Fire).
	fxSlow = 300,				// A slow effect modifier (Ice).
	page = 1,					// A map of your current environment.
	xhr = null,					// An soul gem shaped like a tiny bust of Tim Burners-Lee. The gem is old-school CRT green and is currently empty.
	mobile = false,				// You may or may not be carrying a mobile phone too, for now we'll assume your not.
	codebox = false;

	
/*
	Part 1:
		
		After several days travel you are finally approaching the foothills of a vast mountain range known by the locals as 'The Dark Tops'.
		Peering upwards through the gloom towards the ragged horizon you can make out, amongst the clouds, your destination perched atop an
		impossible precipice. The Castle of the Pixel Monkey.
		
		Your mind races with thoughts of ... 
		( c?  K: "fame, fortune and distressed maidens"; W: "new discoveries of unfathomable power"; P: "bringing peace and light to another dark place")
		...	as you begin the climb to the hidden entrance described by an ancient, worn map you ...
		( c? K: "extracted from a demon infested dungeon."; W: "discovered amongst the pages of an ancient work on pixel manipulation.",
		P:"found in the grip of a deceased monk laying on your doorstep." )

		You approach the location marked on the map and discover what appears to be an ancient stone doorway.  The portal is heavily overgrown,
		the symbols carved around the entrance are barely ledgible, clearly ravaged by the eons.  You inspect the map looking for a clue
		to help you gain entrance to whatever lies beyond. On the back of the map, written in what appears to be troll blood, is a single symbol.
		Scanning the exterior of entranceway you find the same symbol, it's worn but recognisable.  You approach the magic seal and ...
		( c? K: "jam the magic blade of CSS3 into a small crack next to it and apply pressure."; W: "consult your ancient tome of all knowing.  Discovering
		the symbol you speak the ancient word."; P:"analyse the magic field for weaknesses.  You identify a undefined variable and give it a true value."; )
		
		There is a deep rumble from behind the stone door.  A crunch, a click, a whirr.  Dust and debris begins to fall from around the ancient entranceway.
		Moments later the worn gate slides away to reveal a passageway behind.  The passageway is dark but appears to be dimly light by the magic field
		that emanates from the mountain rocks.
		
		You decied to wait until morning before you begin your quest proper as your magic document doesn't appear to be quite ready.
*/	
$(document).ready(function(){
/*	
	Part 2:
		You awaken refreshed.  The campfire is still warm as the sun begins to crest the distant Vale of DOM.
		You take two steps towards the open doorway and suddenly realise you've forgotten to tell anyone where you're going!  As an experienced traveller
		you know this is a recipe for an eternity haunting the place of your demise.
		Roll the magic die:
			-	If you can see the great indicator of content types you've left your phone behind, you decide to proceede anyway.
			-	If the great indicator of content types is hidden from your view you find your phone at the verry bottom of your traveling bag.
				You call your mum.  She tells you to be extra carefull.  You don't like to agree with her but you know she's right.
				You proceed with extreme caution.
				
	TODO:  To be continued...
*/ 
	if($('.indicator').css('display') == 'none'){
		mobile = true;
	}
	
	if($(window).innerHeight() < 600 && !mobile){
		$('#pageHeader').css({ 'position': 'absolute' });
	}
	
	/* navigate */
	$('body').on('click', '.photolink, nav a, .iconset .email', function(e){
		if(mobile){
			return true;
		}
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
		if(codebox) return;
		$('#metadata').stop().animate({ 'opacity': 1 }, fxSlow);
	}).on('mouseout', '#slide, #metadata', function(){
		if(codebox) return;
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
		//console.log(e);
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
					//console.log(e.which);
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

function flickrLazyLoad(){
	var photos = {};
	$.getJSON('/inc/lazyloader-flickr.php?func=getPhotoSet&photoset=' + photoset, function(data){
		photos = data["photos"];
		
		for(var p in photos){
			var photo = photos[p],
				imageHTML = '<div class="col grid2 left"><a href="' + photo.image + '" class="lightbox"><img src="' + photo.thumb + '" alt="' + photo.title + '" title="'  + photo.title +  '"data-id="' + photo.id + '" data-secret="' + photo.secret + '"><span class="seemore zoom">Zoom</span></a></div>';
			$('#anchor').append(imageHTML);
		}
	});
}


function flickrEXIFData(id, secret){
	$.get('/inc/lazyloader-flickr.php?func=getPhotoEXIF&photoid=' + id + '&secret=' + secret, function(data){
		$('#metadata').html(data);
	});
}


function getPage(url, direction){
	
	if(url === 'undefined') return false;
	
	var hide = direction ? 'right' : 'left',
		show = direction ? 'left' : 'right',
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
		
		var navigation = $(data).find('#pageHeader nav').html(),
			pageData = $(data).find('#page').html(),
			pageTitle = $(data).filter('title').text();
		
		if(origPop) origPop = !origPop;
		history.pushState({}, "", url);
		document.title = pageTitle;
		
		$('#cinemaView').remove();
		
		$('#pageHeader nav').html(navigation);
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
	
	codebox = (el.href.match(/.html/ig) || []).length === 1;
	var	cinemaViewHTML = codebox ? '<div id="cinemaView"><div id="lightbox"><span class="prev">&nbsp;</span><iframe id="slide" frameborder="0" scrolling="no"></iframe><div id="metadata"></div><span class="next">&nbsp;</span></div></div>' : '<div id="cinemaView"><div id="lightbox"><span class="prev">&nbsp;</span><img id="slide"/><div id="metadata"></div><span class="next">&nbsp;</span></div></div>';
	
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
		
		if(!codebox) {
			$('#metadata').html('<p>Loading...</p>');
			flickrEXIFData(id,secret);
		}
		
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
			left: (($(window).width() - this.width()) / 2) + 80
		});
		return this;
	};
})( jQuery );