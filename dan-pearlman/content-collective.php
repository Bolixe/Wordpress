<?php
/**
 * The template for displaying detail page of collectives
 *
 */

	if (ICL_LANGUAGE_CODE == 'de') {
		$ti_teaser  = 'ÜBERSICHT';
		$ti_tags    = 'WAS WIR MACHTEN';
		$ti_content = 'Ein bisschen mehr DETAILS';
		$ti_behind  = 'HINTER DEN KULISSEN';
	} elseif (ICL_LANGUAGE_CODE == 'en') {
		$ti_teaser  = 'OVERVIEW';
		$ti_tags    = 'WHAT WE DID';
		$ti_content = 'A BIT MORE DETAIL';
		$ti_behind  = 'BEHIND THE SCENES';
	}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-project'); ?>> 

	<?php
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-article');
	?>

	<header class="entry-header">
	
		<div class="opacity-filter"></div>

		<img alt="Lufthansa_01" class="attachment-post-thumbnail wp-post-image" src="<?= $featured_image[0] ?>" />

		<div class="entry-headline">
			<?php
				the_subtitle('<h1 class="entry-subtitle">', '</h1>');
				the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</div><!--.entry-headline -->
	</header> <!--.entry-header -->

	<div class="head-overview"></div>
	<div class="entry-overview">
		<div class="entry-teaser teaser-column">
			<h3 class="block-title">OVERVIEW</h3>

			<?php

				the_excerpt('<p class="entry-excerpt">', '</p>' );

			?>
		</div><!-- .entry-teaser -->

		<div class="entry-tags">

			<h3 class="block-title">WHAT WE DID</h3>

			<div class="cloud-tags">

				<?php tags_custom_taxonomy( 'note' ); ?>

			</div>
			
		</div><!-- .entry-tags -->
	</div><!-- .entry-overview -->

	<?php
			// Get slideshow shortcode
		$slideshowcode = get_post_meta($post->ID, 'DP_SLIDE_CODE', true);

			// If not empty call shortcode to display it
		if( $slideshowcode != '' ){ 					
	        print do_shortcode(  $slideshowcode );
	    }
	?>

	<div class="entry-content content-column">

		<h3 class="block-title">A BIT MORE DETAIL</h3>

		<?php
			
			the_content( );
		?>

	</div><!-- .entry-content -->

	<?php	
		if ( extra_images_exists() ) {
	?>
		<div class="entry-extras">
			<div class="behind-scenes">
				<h3 class="block-title">BEHIND THE SCENES</h3>
				<?php
					get_extra_images();
				?>
			</div><!-- .behind-scenes -->
		</div><!-- .entry-extras -->
	<?php
		}
	?>

</article><!-- #post-## -->
