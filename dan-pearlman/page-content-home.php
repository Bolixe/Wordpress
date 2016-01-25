<?php
/**
 * The template used for displaying HOME LANDING page 
 *
 */
?>

<div id="post-<?php the_ID(); ?>" class="page type-page">

	<?php
			// Get slideshow shortcode
		$slideshowcode = get_post_meta($post->ID, 'DP_SLIDE_CODE', true);

			// If not empty call shortcode to display it
		if( $slideshowcode != '' ){ 					
	        print '<section class="home-slider">' . do_shortcode(  $slideshowcode ) . '</section>';
	    }
	?>

	<div class="separator"></div>

	<section class="list">
			<?php
				/* translators: %s: Name of current post */
				echo get_the_content();
			?>		
	</section><!-- .list -->

</div><!-- #page-## -->
