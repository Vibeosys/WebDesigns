/* --------------------------------------------
Page Loader
-------------------------------------------- */
$(window).load(function() {
	'use strict';
	$(".loader-item").delay(700).fadeOut();
	$("#pageloader").delay(800).fadeOut("slow");
    
    
    
    
});

jQuery(document).ready(function($) {	
	'use strict';
	
	/* --------------------------------------------
		Animated Items
	-------------------------------------------- */
	
	$('.animated').appear(function() {
		var elem = $(this);
		var animation = elem.data('animation');
		if ( !elem.hasClass('visible') ) {
			var animationDelay = elem.data('animation-delay');
			if ( animationDelay ) {
	
				setTimeout(function(){
					elem.addClass( animation + " visible" );
				}, animationDelay);
	
			} else {
				elem.addClass( animation + " visible" );
			}
		}
	});
		
$('.video-play-icon').on('click',function(){
    
    $(this).hide();
    
});
	/* --------------------------------------------
		Load More
	-------------------------------------------- */
	var loadtext = $('.load-more');
	$(".load-posts").click(function() {
		if($(this).hasClass('disable')) return false;
		
			$(this).html('<i class="fa fa-spin fa-spinner"></i> Loading');
			
		   var $hidden = loadtext.filter(':hidden:first').delay(600);  
	
		   if (!$hidden.next('.load-more').length) {
			   $hidden.fadeIn(500);
				$(this).addClass('disable');
				$(this).fadeTo("slow", 0.23)/*.delay(600)*/
				.queue(function(n) {
				 $(this).html('All Posts Loaded');
				 n();
				}).fadeTo("slow", 1);
			
		   } else {
				$hidden.fadeIn(500);
				$(this).fadeTo("slow", 0.23)/*.delay(600)*/
				.queue(function(g) {
				 $(this).html('Load More Post <i class="flaticon-arrow209">');
				 g();
				}).fadeTo("slow", 1);			
		   }
	});
});
	

/* --------------------------------------------
Fixed Menu on Scroll
-------------------------------------------- */
jQuery(document).ready(function($) {
	'use strict';
	$("#sticky-section").sticky({topSpacing:0});
});

/* --------------------------------------------
Portfolio Scripts
-------------------------------------------- */	
$(document).ready(function() { 
	'use strict';
	
	//expander
  	var loader = $('.item-expander');
	if(typeof loader.html() == 'undefined'){
		$('<div class="item-expander"><div id="item-expander" class="container clearfix relative"><p class="cls-btn"><a class="close">X</a></p><div/></div></div>').css({opacity:0}).hide().insertAfter('.portfolio');
		loader = $('.item-expander');
	}
	$('.expander').on('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var url = $(this).attr('href');
		loader.slideUp(function(){
			$.get(url, function(data){
				var portfolioContainer = $('.portfolio');
				var topPosition = portfolioContainer.offset().top;
				var bottomPosition = topPosition + portfolioContainer.height();
				$('html,body').delay(600).animate({ scrollTop: bottomPosition - -10}, 800);
				var container = $('#item-expander>div', loader);
				
				container.html(data);
				 $(".fit-vids").fitVids();
				$('.project').flexslider({
					animation: "fade",
					selector: ".project-slides .slide",
					controlNav: true,
					directionNav: true ,
					slideshowSpeed: 5000,  
				  });
				
				//container.fitVids();
				loader.slideDown(function(){
					if(typeof keepVideoRatio == 'function'){
						keepVideoRatio('.project-video > iframe');
					}
				}).delay(1000).animate({opacity:1}, 200);
			});
		});
	});		
	$('.close', loader).on('click', function(){
		loader.delay(300).slideUp(function(){
			var container = $('#item-expander>div', loader);
			container.html('');
			$(this).css({opacity:0});
			
		});
		var portfolioContainer = $('.portfolio');
			var topPosition = portfolioContainer.offset().top;
			$('html,body').delay(0).animate({ scrollTop: topPosition - 70}, 500);
	});
});

/* --------------------------------------------
 Scroll Navigation
-------------------------------------------- */	
$(function() {
	'use strict';
	jQuery('.scroll').bind('click', function(event) {
		var $anchor = jQuery(this);
		var headerH = jQuery('#navigation').outerHeight();
			jQuery('html, body').stop().animate({					
				scrollTop : jQuery($anchor.attr('href')).offset().top  + 2 + "px"
			}, 1200, 'easeInOutExpo');

		event.preventDefault();
	});
});
/* --------------------------------------------
 Menus hide after click --  mobile devices
-------------------------------------------- */	
$(function() {
	"use strict";
	$('.nav li a').click(function () {
		$('.navbar-collapse').removeClass('in');
	});
});


/* --------------------------------------------
 Active Navigation
-------------------------------------------- */

	jQuery('body').scrollspy({ 
		target: '#topnav',
		offset: 95
	});

/* --------------------------------------------
Canvas Generator
-------------------------------------------- */
$(window).load(function() {
	'use strict';
	canvasElementsInit();
});
jQuery(document).ready(function($) {
	'use strict';
	canvasElementsInit();
});
$(window).resize(function() {
	'use strict';
	canvasElementsInit();
});
function canvasElementsInit() {
	$( '.canvas-color' ).each(function() {
		var loadfunction;
		loadfunction = $(this).data('load');
		div_id = this.id;
		if( loadfunction == "drawcolor" ) {
			window[loadfunction](div_id, $(this).data('width'), $(this).data('height'), $(this).data('color'), $(this).data('hvcolor'), $(this).data('icon'), $(this).data('iconsize'), $(this).data('iconcolor'), $(this).data('container'), $(this).data('animate'), '', $(this).data('link'), $(this).data('target') );
		}
	});
	
	$( '.canvas-graph' ).each(function() {
		var draw_loadfunction;
		draw_loadfunction = $(this).data('load');
		info_div_id = this.id;
		
		width = $(this).width();
		
		if( width < $(this).data('width') ) {
			width = $(this).width();
			height = $(this).width();
		} else {
			width = $(this).data('width');
			height = $(this).data('height');
		}
		
		if( width < $(this).data('width') && width <= 340 ) {
			var iconsize = 30;
		}
		else {
			var iconsize = $(this).data('iconsize');
		}
		
		if( draw_loadfunction == "drawinfograph" ) {			
			window[draw_loadfunction](info_div_id, width, height, $(this).data('brcolor'), $(this).data('border'), $(this).data('scborder'), $(this).data('icon'), iconsize, $(this).data('iconcolor'), $(this).data('iconbgcolor'), $(this).data('pointcolor'), $(this).data('pointhvcolor'), $(this).data('ctext1'), $(this).data('ctext2'), $(this).data('ctext3'), $(this).data('ctext4'), $(this).data('ctext5'), $(this).data('width'), $(this).data('height') );
		}
	});
}
	   
/* --------------------------------------------
 Count Factors
-------------------------------------------- */  

(function($) {
	'use strict';
	$.fn.countTo = function(options) {
		// merge the default plugin settings with the custom options
		options = $.extend({}, $.fn.countTo.defaults, options || {});
	
		// how many times to update the value, and how much to increment the value on each update
		var loops = Math.ceil(options.speed / options.refreshInterval),
			increment = (options.to - options.from) / loops;
	
		return $(this).each(function() {
			var _this = this,
				loopCount = 0,
				value = options.from,
				interval = setInterval(updateTimer, options.refreshInterval);
	
			function updateTimer() {
				value += increment;
				loopCount++;
				$(_this).html(value.toFixed(options.decimals));
	
				if (typeof(options.onUpdate) == 'function') {
					options.onUpdate.call(_this, value);
				}
	
				if (loopCount >= loops) {
					clearInterval(interval);
					value = options.to;
	
					if (typeof(options.onComplete) == 'function') {
						options.onComplete.call(_this, value);
					}
				}
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,  // the number the element should start at
		to: 100,  // the number the element should end at
		speed: 1000,  // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,  // the number of decimal places to show
		onUpdate: null,  // callback method for every time the element is updated,
		onComplete: null,  // callback method for when the element finishes updating
	};
	
})(jQuery); 

$(document).ready(function() {	
	$(".fact-number").appear(function(){
		$('.fact-number').each(function(){
			dataperc = $(this).attr('data-perc');
			$(this).find('.factor').delay(6000).countTo({
				from: 10,
				to: dataperc,
				speed: 3000,
				refreshInterval: 50,
			});
		});
	});
});
 
/* --------------------------------------------
Contact Form
-------------------------------------------- */	
jQuery(document).ready(function($) {
		'use strict';
		
		
	
	function resetForm($form) {
		$form.find('input:text, input:password, input, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
	}	
});
	
