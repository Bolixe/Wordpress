<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

 				//echo $post->ID ." dfa " . $post->post_name; 

 			if( is_front_page() ) { 
				get_template_part( 'page-content-home', 'page' );

			}else if(($post->post_name == 'uber-dan') || ($post->post_name == 'about-dan')) {
				get_template_part( 'page-content-about', 'page' );

 			}else if(($post->post_name == 'contact') || ($post->post_name == 'kontakt')) {
				get_template_part( 'page-content-contact', 'page' );

 			}else if(($post->post_name == 'impressum') || ($post->post_name == 'imprint')) {
				get_template_part( 'page-content-imprint', 'page' );

 			}else if(($post->post_name == 'unsere-ansatz') || ($post->post_name == 'our-approach')) {
				get_template_part( 'page-content-approach', 'page' );

 			}else{ 
				get_template_part( 'content', 'page' );

 			}			

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
