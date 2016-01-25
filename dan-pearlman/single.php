<?php
/*
*
* The template for displaying all single posts and attachments
*
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		
			while ( have_posts() ) : the_post();

				/*
				 * Get post type and call the specific template for the type	
				 */

				if ($post->post_type == 'work') {
					get_template_part( 'content-work', get_post_format() );
				}else if ($post->post_type == 'news') {
					get_template_part( 'content-news', get_post_format() );
				}else if ( $post->post_type == 'collective' ) {
					get_template_part( 'content-collective', get_post_format() );
				}else if ( $post->post_type == 'jobs' ) {
					get_template_part( 'content-jobs', get_post_format() );
				}else{
					get_template_part( 'content', get_post_format() );				
				}

			endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
