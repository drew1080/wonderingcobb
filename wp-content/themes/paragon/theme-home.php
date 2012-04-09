<?php
/*
Template Name: Home Theme
*/
?>

<?php get_header(); ?>

<!-- BEGIN full-logo -->
<div class="full-header">

	<!-- BEGIN g720 #tagline -->
	<div class="g720" id="tagline">
		
		<?php if ( $onetop = get_option('of_one_top') ) { ?>
		
			<h1 class="tagline-option"><?php echo stripslashes( $onetop ) ?></h1> 
			
		<?php } ?>
			
	<!-- END g720 #tagline -->
	</div>
			
	<!-- BEGIN main -->
	<div class="main">

	<!-- BEGIN choose slider -->
	<?php $slider = get_option('of_slider'); ?>
	
	<?php if ( $slider == 'nivo' ) { 
	
	include (TEMPLATEPATH . '/framework/includes/nivo.php');	
	
	} elseif ( $slider == 'anything' ) {
	
	include (TEMPLATEPATH . '/framework/includes/anythingSlider.php');
	
	} elseif ( $slider == 'kwicks' ) {
	
	include (TEMPLATEPATH . '/framework/includes/kwicks.php');
	
	} else {
	
	include (TEMPLATEPATH . '/framework/includes/demo-slider.php');
	
	}
	
	?>

	<!-- END main -->
	</div>

<!-- END full-header -->
</div>

<div class="clear"></div>

<!-- BEGIN WRAP -->
<div id="wrap">

	<div id="top-wrap">

		<!-- BEGIN main -->
		<div class="main" id="home-about">

			<!-- BEGIN g320 -->
			<div class="g320" id="home-left">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home I') ) : ?>

			<h2 class="title">What We Do </h2>

			<p>Pellentesque eu velit at mauris tinc feugiat eget ut lorem. Pellentesque sollicitudin sodales dam.</p>

			<p>Suspendisse semper, tortor et lobortis mattis, turpis lacus placerat tortor, quis convallis metus mi vitae quam.</p>
		
			<p>Pellentesque eu velit at mauris tinc feugiat eget ut lorem at dignissim dui ligula eu tellus.</p>

			<?php endif; ?>

		<!-- END g320 -->
		</div>

		<!-- BEGIN g320 -->
		<div class="g320" id="home-middle">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home II') ) : ?>

			<h2 class="title">Who We Are</h2>

			<p><img src="http://www.minmlpixl.com/photo.png">Pellentesque eu velit at mauris tinc feugiat eget ut lorem. Mauris tinc.</p>
		
			<p><img src="http://www.minmlpixl.com/photo2.png">Suspendisse semper, tortor et lobortis mattis, turpis lacus. tortor et.</p>
		
			<p><img src="http://www.minmlpixl.com/photo3.png">Pellentesque eu velit at mauris tinc feugiat eget ut lorem. Mauris tinc.</p>
		
			<p><img src="http://www.minmlpixl.com/photo2.png">Suspendisse semper, tortor et lobortis mattis, turpis lacus. tortor et.</p>

			<?php endif; ?>

		<!-- END g320 -->
		</div>

		<!-- BEGIN g320 -->
		<div class="g320" id="home-right" style="margin-right:0">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home III') ) : ?>

			<h2 class="title" id="last"><span>Testimonials</span></h2>

			<blockquote>One of the interesting aspects of this is I also have an urge to eat lucky charms in the nude, while watching David Hasslehoff swim in an ocean of flesh eating monsters.</blockquote>

			<br/>

			<blockquote>Your work is amazing!  Keep it up!  I look forward to watching your work develop over the years.  I also like to watch fish swim in a bowl.</blockquote>

			<?php endif; ?>

		<!-- END g320 -->
		</div>

	<!-- END main -->
	</div>

<!-- END top-wrap -->
</div>

<!-- BEGIN middle-wrap -->
<div id="middle-wrap">

	<!-- BEGIN main -->
	<div class="main" id="home-about-two">
	
		<!-- BEGIN g320 -->
		<div class="g320" id="home-left" style="margin-top:0">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home IV') ) : ?>

			<h2 class="title">Our Latest Work</h2>

			<p>Pellentesque eu velit at mauris tinc feugiat eget ut lorem. Pellentesque sollicitudin sodales dam.</p>

			<p>Suspendisse semper, tortor et lobortis mattis, turpis lacus placerat tortor, quis convallis metus mi vitae quam.</p>
		
			<p>Pellentesque eu velit at mauris tinc feugiat eget ut lorem at dignissim dui ligula eu tellus.</p>

			<?php endif; ?>

		<!-- END g320 -->
		</div>
	
		<?php query_posts( 'post_type=portfolio&posts_per_page=6'.'&paged='.$paged); ?>

		<?php if (have_posts()) : $count=0; while (have_posts()) : the_post(); ?>
		
		<?php $count++; if($count==3){ $var='style="margin-right:0 !important"'; $count=0; } else { $var=""; } ?>  
		
		<!-- Get that image resized! -->
		<?php 
		$thumb = get_post_thumbnail_id(); 
 		$image = vt_resize( $thumb,'' , 175, 110, true );
 		?>
 		
		<!-- Hover Options -->
		<?php $mosaic = get_option('of_mosaic'); ?>

		<!-- BEGIN mosaic block bar -->
		<div class="mosaic-block <?php echo $mosaic; ?>" <?php echo $var; ?>> 

			<!-- BEGIN post -->
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<!-- BEGIN mosaic overlay -->
				<a class="mosaic-overlay" href="<?php the_permalink() ?>">
				
					<!-- BEGIN details -->
					<div class="details"> 
						
						<h4 class="title"><?php the_title(); ?></h4> 
						
							<p class="date"><?php the_time('F jS, Y') ?></p>
							
					<!-- END details -->
					</div> 
				
				<!-- END mosaic-overlay -->
				</a>
				
				<!-- BEGIN mosaic backdrop -->
				<div class="mosaic-backdrop">
				
					<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="image"/>
				
				<!-- END mosaic-backdrop -->
				</div>
		
			<!-- END post -->
			</div>

			<!-- END mosaic block bar-->	
			</div>
			<?php endwhile; ?>
	
			<?php endif; ?>

		<!-- END main -->	
		</div>

<!-- END middle-warp -->
</div>

<!-- BEGIN bottom-wrap -->
<div id="bottom-wrap">

	<!-- BEGIN main -->
	<div class="main" id="home-about-bottom">
	
		<!-- BEGIN g320 -->
		<div class="g320" id="home-left" style="margin-top:0">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home V') ) : ?>

			<h2 class="title">From Our Blog</h2>

			<p>Pellentesque eu velit at mauris tinc feugiat eget ut lorem. Pellentesque sollicitudin sodales dam.</p>

			<p>Suspendisse semper, tortor et lobortis mattis, turpis lacus placerat tortor, quis convallis metus mi vitae quam.</p>
		
			<p>Pellentesque eu velit at mauris tinc feugiat eget ut lorem at dignissim dui ligula eu tellus.</p>

			<?php endif; ?>

		<!-- END g320 -->
		</div>

		<?php $args=array( 'showposts' => 3 ); $my_query = new WP_Query($args); ?>
		
		<?php if ( $my_query->have_posts() ) { $count=0; while ($my_query->have_posts()) : $my_query->the_post(); ?> 
		
		<?php $count++; if($count==1){ $var='style="margin-left:0px !important"'; $count=0; } else { $var=""; } ?>  
		
		<!-- Get that image resized! -->
		<?php 
		$thumb = get_post_thumbnail_id(); 
 		$image = vt_resize( $thumb,'' , 170, 150, true );
 		$fullthumb = get_post_thumbnail_id();
 		$fullimg = vt_resize( $fullthumb, '', 600, true)
 		?>
 		
 		<!-- BEGIN text-wrap -->
 		<div class="text-wrap" <?php echo $var; ?>>
 		
 			<!-- BEGIN mosaic block bar -->
			<div class="mosaic-block circle"> 

				<!-- BEGIN post -->
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
					<!-- BEGIN mosaic-overlay -->
					<a class="mosaic-overlay zoom" href="<?php echo $fullimg[url]; ?>">
				
					&nbsp;
				
					<!-- END mosaic-overlay -->
					</a>
				
					<!-- BEGIN mosaic-backdrop -->
					<div class="mosaic-backdrop">
				
						<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="image"/>
				
					<!-- END mosaic-backdrop -->
					</div>
		
				<!-- END post -->
				</div>
		
			<!-- END mosaic block bar-->	
			</div>
		
			<!-- CLEAR -->
			<div class="clear" style="height:1px;"></div>
			
			<h4 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4> 
						
			<p class="date"><?php the_time('F jS, Y') ?></p>
			
			<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>
		
		<!-- END text-wrap -->		
		</div>
	
		<?php $count++;  ?>
		<?php endwhile; } //while ($my_query) ?>
		<?php wp_reset_query() ?>
			
	<!-- END MAIN -->
	</div>

<!-- END bottom-wrap -->
</div>

<br style="clear: both;">

<!-- END WRAP -->	
</div>

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

<?php get_footer(); ?>