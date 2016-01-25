<?php
/**
 * The template for displaying detail page of news
 *
 */

	if (ICL_LANGUAGE_CODE == 'de') {
	 	$placeholder = 'Ihre E-Mail-Adresse';
	} elseif (ICL_LANGUAGE_CODE == 'en') {
	 	$placeholder = 'Your e-mail address';
	}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-project'); ?>> 

	<?php
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-article');
			//$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
			/*if(!empty($get_description)){//If description is not empty show the div
				echo '<div class="featured_caption">' . get_post(get_post_thumbnail_id())->post_excerpt . '</div>';
			}*/
	?>

	<header class="entry-header">
	
		<div class="opacity-filter"></div>

		<img alt="Lufthansa_01" class="attachment-post-thumbnail wp-post-image" src="<?= $featured_image[0] ?>" />

		<div class="entry-headline">
			<?php

				the_subtitle('<h1 class="entry-subtitle">', '</h1>');				

				// Get slideshow shortcode
				$headlineshorcode = get_post_meta($post->ID, 'NEWS_HEADER_TITLE', true);

					// If not empty call shortcode to display it
				if( $headlineshorcode != '' ){ 					
			        print '<h1 class="entry-title">' . $headlineshorcode . '</h1>';
			    }

			?>
		</div><!--.entry-headline -->
	</header> <!--.entry-header -->

	<div class="head-overview"></div>
	
	<div class="entry-overview">

		<div class="entry-news">

			<h3 class="block-title">&nbsp;</h3>

			<?php

				the_title( '<h1 class="entry-news-title">', '</h1>' );

				the_date( 'F j, Y', '<span class="entry-date">','</span>' );

				echo get_the_term_list( $post->ID, 'label', '<span class="entry-news-tags">', ', ', '</span>' ); 

				$caption = get_post(get_post_thumbnail_id())->post_excerpt;
				if ($caption) {
					echo '<span class="entry-photo-caption">PHOTOGRAPHY: ' . get_post(get_post_thumbnail_id())->post_excerpt . "</span>";	
				}

				echo "<span style='margin-bottom: 15px; display: block;'></span>";
			
				the_content( );
				
					// Get slideshow shortcode
				$slideshowcode = get_post_meta($post->ID, 'DP_SLIDE_CODE', true);

					// If not empty call shortcode to display it
				if( $slideshowcode != '' ){ 					
			        print do_shortcode(  $slideshowcode );
			    }
			?>

			<div class="entry-share">

				<h3 class="block-title">Share</h3>

				<?php echo do_shortcode(  "[shariff]" ); ?>	

			</div><!-- .entry-share -->

			<div class="entry-newsletter">
				<?php
					if(is_active_sidebar('sidebar-3')){

						dynamic_sidebar('sidebar-3');
					}
				?>
			</div><!-- .entry-share -->

		</div><!-- .entry-news -->

		<div class="entry-related">		

			<?php joints_related_posts( 'Related News' ); ?>

		</div><!-- .entry-related -->
	</div><!-- .entry-overview -->

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

<script type="text/javascript">

	(function($){
		$(document).ready(function(){

			$('.alo_easymail_form_table tr td #opt_email').attr('placeholder', '<?= $placeholder ?>');

		});
	})(jQuery);

</script>

