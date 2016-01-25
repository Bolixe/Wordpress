<?php
/**
 * The template used for displaying Imprint 
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<div class="entry-content">

		<?php the_title( '<h3 class="block-title">', '</h3>' ); ?>

		<?php the_content(); ?>

	</div><!-- .entry-content -->


</article><!-- #post-## -->