<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 

	if(ICL_LANGUAGE_CODE == 'de')
	 	$search_label = 'Suche nach :';
	else if(ICL_LANGUAGE_CODE == 'en')
	 	$search_label = 'Search for :';

	$category_image = get_template_directory_uri( ) . '/img/headers/No-results.jpg';
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<header class="entry-header">
	
			<div class="opacity-filter"></div>

			<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

			<div class="section-headline">

				<div class="section-title section-center">
					<h1 class="section-name"><?= $search_label ?> <span class="search-word-mobile"><?php printf( __( '%s', 'twentyfifteen' ), get_search_query() ); ?></span></h1>
					<span class="line"></span>
					<h1 class="section-subname">dan pearlman</h1>
				</div>
				<div class="section-description">
					<span class="search-word">
						<?php printf( __( '%s', 'twentyfifteen' ), get_search_query() ); ?>
					</span>
				</div>
			</div><!--.section-headline -->
		</header> <!--.entry-header -->

		<section class="taxonomy" style="height: 25px;"></section>

		<?php if ( have_posts() ) : ?>
			<section class="list">
			<?php
				// Start the loop.
			$loopcounter = 1;
			while ( have_posts() ) : 

				the_post(); 
			
				$post->looper = $loopcounter;

				$loopcounter++;
				
				get_template_part( 'content', 'search' );

			// End the loop.
			endwhile;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );
		?>

		</section><!-- .content-area -->

		<?php endif; ?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
