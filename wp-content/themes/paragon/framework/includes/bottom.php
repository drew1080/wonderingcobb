<?php if ( $twitter = get_option('of_twitter') ) { ?>

<?php $twitterNum = get_option('of_twitter_num') ?>

<script>
jQuery(document).ready(function($){

$("#tweet").tweetrotator({ operator: "from:<?php echo ( $twitter ); ?>", direction: "horizontal", multiple_colors: true, tweetlimit: <?php echo ( $twitterNum ); ?>, autorotate: false, idletime: 55, parameters: "", prefix: "color_alt_" });

//end
});
</script>

<?php } ?>

<?php if ( get_option('of_twitter_option') == "true" ) { ?>

<!-- BEGIN full-bottom -->
<div class="full-bottom">

	<!-- BEGIN main -->
	<div class="main">
	
		<!-- BEGIN g960 #tagline-->
		<div class="g960" id="bottom-tagline">
		
			<!-- TWITTER -->
			<div id="tweet"></div>
			
			<div class="twitter"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/tweet-dark.png"></div>
		
		<!-- END g960 #tagline -->
		</div>
		
<?php } elseif ( get_option('of_twitter_option') == "false" ) { ?>
		
<!-- BEGIN full-bottom -->
<div class="full-bottom-no-twitter">

	<!-- BEGIN main -->
	<div class="main">
		
	<?php } ?>
	
		<!-- BEGIN g720 #bottom-->
		<div class="g960" id="bottom">
		
			<!-- BEGIN g240 -->
			<div class="g240">
	  	 	
	  	 		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer I') ) : ?>
			
				<h1 class="title"><?php _e('Sample Text', 'paragon'); ?></h1>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
				
				<br/>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
			
				<?php endif; ?>
			
			<!-- END g240 -->
	   	 	</div> 
			
			<!-- BEGIN g240 -->
			<div class="g240">
	  	 	
	  	 		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer II') ) : ?>
			
				<h1 class="title"><?php _e('Sample Text', 'paragon'); ?></h1>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
				
				<br/>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
			
				<?php endif; ?>
			
			<!-- END g240 -->
	   	 	</div>  
	   	 	
	   	 	<!-- BEGIN g240 -->
	   	 	<div class="g240">
	  	 	
	  	 		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer III') ) : ?>
			
				<h1 class="title"><?php _e('Sample Text', 'paragon'); ?></h1>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
				
				<br/>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
			
				<?php endif; ?>
			
			<!-- END g240 -->
	   	 	</div>
	   	 	
	   	 	<!-- BEGIN g240 -->
	   	 	<div class="g240" id="last">
	  	 	
	  	 		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer IV') ) : ?>
			
				<h1 class="title"><?php _e('Sample Text', 'paragon'); ?></h1>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
				
				<br/>
				
				<p><?php _e('This is a widget area.  To change this area, go to Appearance > Widgets, find a cool widget, drag and drop into the area that says Sidebar One, and your widget will appear here.', 'paragon'); ?></p>
			
				<?php endif; ?>
			
			<!-- END g240 -->
	   	 	</div>	 	
	   	 		  	 			
		<!-- END g720 #bottom -->
		</div>
	
	<!-- END main -->
	</div>

<!-- END full-bottom -->
</div>