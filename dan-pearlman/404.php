<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

	get_header(); 

	if(ICL_LANGUAGE_CODE == 'de'){

	 	$head_title  = 'SEITE NICHT GEFUNDEN';
	 	$head_slogan = 'Bitte versuche es erneut';

	}else if(ICL_LANGUAGE_CODE == 'en'){

	 	$head_title  = 'PAGE NOT FOUND';
	 	$head_slogan = 'Please try again';

	}

	$category_image = get_template_directory_uri( ) . '/img/headers/No-results.jpg';

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">

					<div class="opacity-filter"></div>

					<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

					<div class="section-headline section-headline-center">

						<div class="section-title section-center">
							<h1 class="section-name"><?= $head_title ?></h1>
							<span class="line"></span>
							<h1 class="section-subname"><?= $head_slogan ?></h1>
							<?php get_search_form(); ?>
						</div>		

					</div><!--.entry-headline -->
				</header> <!--.entry-header -->

				<div class="separator"></div>

				<section class="list">
				
					
				</section>

			</article><!-- #post-## -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
