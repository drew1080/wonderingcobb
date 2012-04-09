jQuery(document).ready(function($){


//////////////////////////////////////////////////////// Tipsy

$('[class=tip]').tipsy({fade: true, gravity: 's'});






//////////////////////////////////////////////////////// Menu 

$("ul.sf-menu").supersubs({ 
            minWidth:    12,   // minimum width of sub-menus in em units 
            maxWidth:    27,   // maximum width of sub-menus in em units 
            extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
                               // due to slight rounding differences and font-family 
}).superfish({ 

delay:       1000,                            // one second delay on mouseout 
animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
speed:       'fast',                          // faster animation speed 
autoArrows:  true,                           // disable generation of arrow mark-up 
dropShadows: false                            // disable drop shadows 

}); 
  



//////////////////////////////////////////////////////// Inline


$('input[title]').each(function() {
	
	if($(this).val() === '') {
		$(this).val($(this).attr('title'));	
			}
		$(this).focus(function() {
	if($(this).val() == $(this).attr('title')) {
		$(this).val('').addClass('focused');	
			}
			});
		$(this).blur(function() {
	if($(this).val() === '') {
		$(this).val($(this).attr('title')).removeClass('focused');	
			}
			});
		}); 


//////////////////////////////////////////////////////// Fancybox



	/* This is basic - uses default settings */
	
	$("a#zoom").fancybox();
	
	/* Using custom settings */
	
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	/* Apply fancybox to multiple items */
	
	$(".zoom").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});


//////////////////////////////////////////////////////// Shortcode Toggle



//Hide (Collapse) the toggle containers on load
	jQuery(".toggle_content").hide(); 

	//Switch the "Open" and "Close" state per click
	jQuery("h3.toggle").toggle(function(){
		jQuery(this).addClass("active");
		}, function () {
		jQuery(this).removeClass("active");
	});

	//Slide up and down on click
	jQuery("h3.toggle").click(function(){
		jQuery(this).next(".toggle_content").slideToggle();
	});


//////////////////////////////////////////////////////// Mosaic


		jQuery(function($){
				
				$('.circle').mosaic({
					opacity		:	0.8			//Opacity for overlay (0-1)
				});
				
				$('.fade').mosaic();
				
				$('.bar').mosaic({
					animation	:	'slide'		//fade or slide
				});
				
				$('.bar2').mosaic({
					animation	:	'slide'		//fade or slide
				});
				
				$('.bar3').mosaic({
					animation	:	'slide',	//fade or slide
					anchor_y	:	'top'		//Vertical anchor position
				});
				
				$('.cover').mosaic({
					animation	:	'slide',	//fade or slide
					hover_x		:	'400px'		//Horizontal position on hover
				});
				
				$('.cover2').mosaic({
					animation	:	'slide',	//fade or slide
					anchor_y	:	'top',		//Vertical anchor position
					hover_y		:	'80px'		//Vertical position on hover
				});
				
				$('.cover3').mosaic({
					animation	:	'slide',	//fade or slide
					hover_x		:	'400px',	//Horizontal position on hover
					hover_y		:	'300px'		//Vertical position on hover
				});
		    
		    });



//////////////////////////////////////////////////////// Back to Top

// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});
 
		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});	    
	
	
//////////////////////////////////////////////////////// Isotope


var $container = $('#isotope2');
      var $isoID = $('#filters .active').attr('data-filter');

	  $container.isotope({
		itemSelector: '.mosaic-block',
		animationEngine: 'jquery',
		animationOptions: {
			duration: 350,
			easing: 'linear',
		queue: true
		}
	  });
	  $container.isotope({ filter: $isoID });

	$('#filters li a').click(function() {
		$('#filters li a').removeClass('active');
		$(this).addClass('active');
		$isoID = $(this).attr('data-filter');
		$container.isotope({ filter: $isoID });
		return false;
	});

//end
});

 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26954954-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
	