<?php

/**
 * The template for displaying detail page of projects
 *
 */

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

			<?php 

				//the_tags( '<div class="cloud-tags">', ', ', '</div>' );


				// WP 4.4 causes a problem with the functions the_tags(); 
				// It is a temporary hack to bring the tags  

				$i    = 1;
				$tags = wp_get_post_tags( $post->ID );
				$len  = count( $tags );
				$html = '<div class="cloud-tags">';

				foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );

					$html .= "<a href='{$tag_link}' rel='tag'>";
					$html .= "{$tag->name}</a>";
					if ($i < $len) 
						$html .= ", ";
					$i++;
				}

				$html .= '</div>';

				echo $html;
			?>





			<div class="cloud-tags">

				<?php//tags_custom_taxonomy( 'post_tag' ); ?>

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

	<?php

		$fulltext = get_the_content();
		if ( strlen($fulltext) ) {

	?>

			<div class="entry-content content-column">
				<h3 class="block-title">A BIT MORE DETAIL</h3>
				<?= the_content() ?>
			</div><!-- .entry-content -->

	<?php
	
		}
	
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

	<div class="entry-share share-align">

		<h3 class="block-title">Share</h3>

		<?php echo do_shortcode(  "[shariff]" ); ?>	

	</div><!-- .entry-share -->

</article><!-- #post-## -->


<?php 

// FIX THE PART OF THE EXTRA IMAGES CALL FUNCTION
//if ( extra_images_exists() ) {

//$extra_images_array  = array();		
//$extra_images_array = get_extra_images();
/*for($i = 0 ; $i < $extra_images_array ; $i++)
{
//$extra_images33 .=  '<img src="'.  $extra_images_array[$i] . '" alt="" />';
}*/
?>
