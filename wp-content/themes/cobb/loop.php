<!-- BEGIN full-logo -->
<div class="full-header" id="blog">
			
<!-- BEGIN main -->
<div class="main">

	<!-- BEGIN g720 #tagline -->
	<div class="g720" id="tagline">
		
		<?php if ( $onetop = get_option('of_one_top') ) { ?>
		
			<h1 class="tagline-option"><?php echo stripslashes( $onetop ) ?></h1> 
			
		<?php } ?>
			
	<!-- END g720 #tagline -->
	</div>

<!-- END .main -->
</div>

<!-- END full-header -->
</div>

<div class="clear"></div>

<!-- BEGIN WRAP -->
<div id="wrap">

<!-- BEGIN choose a layout -->
<?php $layout = get_option('of_layout'); ?>

<?php
	
if ( $layout == 'Layout1' ) {    
    	
include (TEMPLATEPATH . '/framework/includes/layout1.php');

} elseif ( $layout == 'Layout2' ){	
   	 			
include (TEMPLATEPATH . '/framework/includes/layout2.php');
   	 			
} elseif ( $layout == 'Layout3' ){	
   	 			
include (TEMPLATEPATH . '/framework/includes/layout3.php');
   	 
} elseif ( $layout == 'Layout4' ){	
   	 			
include (TEMPLATEPATH . '/framework/includes/layout4.php');
   	 
} elseif ( $layout == 'Layout5' ){	
   	 			
include (TEMPLATEPATH . '/framework/includes/layout5.php');
   	 
} elseif ( $layout == 'Layout6' ){	
   	 			
include (TEMPLATEPATH . '/framework/includes/layout6.php');

} else {
 	
include (TEMPLATEPATH . '/framework/includes/layout1.php');
 	
}

?>

<br style="clear: both;">

</div>