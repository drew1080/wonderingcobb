<?php
function siiimple_enqueue_scripts() {
	if(!is_admin()){
		wp_deregister_script( 'jquery' );
		
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
		
		wp_enqueue_script( 'Custom', SIIIMPLE_JS .'/custom.js', array('jquery'));
		
		wp_enqueue_script( 'Mousewheel', SIIIMPLE_JS .'/jquery.mousewheel.js', array('jquery'));
		
		wp_enqueue_script( 'Easing', SIIIMPLE_JS .'/jquery.easing.1.3.js', array('jquery'));
		
		wp_enqueue_script( 'Tweet', SIIIMPLE_JS .'/tweetrotator.js', array('jquery'));
		
		wp_enqueue_script( 'Menu', SIIIMPLE_JS .'/superfish.js', array('jquery'));
		
		wp_enqueue_script( 'Supersubs', SIIIMPLE_JS .'/supersubs.js', array('jquery'));
		
		wp_enqueue_script( 'tipsy', SIIIMPLE_JS .'/jquery.tipsy.js', array('jquery'));
		
		wp_enqueue_script( 'AnythingSlider', SIIIMPLE_JS .'/jquery.anythingslider.js', array('jquery'));
		
		wp_enqueue_script( 'AnythingFX', SIIIMPLE_JS .'/jquery.anythingslider.fx.js', array('jquery'));
				
		wp_enqueue_script( 'Nivo', SIIIMPLE_JS .'/jquery.nivo.slider.pack.js', array('jquery'));
		
		wp_enqueue_script( 'Isotope', SIIIMPLE_JS .'/jquery.isotope.min.js', array('jquery'));
		
		wp_enqueue_script( 'Hover', SIIIMPLE_JS .'/hoverIntent.js', array('jquery'));
		
		wp_enqueue_script( 'Rotate', SIIIMPLE_JS .'/jquery.rotate.js', array('jquery'));
		
		wp_enqueue_script( 'kwicks', SIIIMPLE_JS .'/jquery.kwicks-1.5.1.js', array('jquery'));		
		
		wp_enqueue_script( 'FancyBox', SIIIMPLE_JS .'/jquery.fancybox-1.3.4.pack.js', array('jquery'));		

		wp_enqueue_script( 'mosaic', SIIIMPLE_JS .'/mosaic.1.0.1.min.js', array('jquery'));
		
		
		}
}
add_action('wp_print_scripts', 'siiimple_enqueue_scripts');
add_action('wp_print_styles', 'siiimple_enqueue_scripts');
?>