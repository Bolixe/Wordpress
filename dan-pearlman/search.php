<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

	get_header(); 


	 if(ICL_LANGUAGE_CODE == 'de'){
	 	$search_label = 'Suche nach :';
	 	$head_title  = 'KEINE ERGEBNISSE';
	 	$head_slogan = 'Bitte versuche es erneut';
	}else if(ICL_LANGUAGE_CODE == 'en'){
	 	$head_title  = 'NO RESULTS';
	 	$head_slogan = 'Please try again';
	 	$search_label = 'Search for :';
	}


		if ( have_posts() ) : 

			$category_image = get_template_directory_uri( ) . '/img/headers/No-results.jpg';

	?>

			<section id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<header class="entry-header">
			
					<div class="opacity-filter"></div>

					<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

					<div class="section-headline section-headline-center">

						<div class="section-title section-center">
							<h1 class="section-name"><?= $search_label ?></h1>
							<span class="line"></span>
							<h1 class="section-subname"><?php printf( __( '%s', 'twentyfifteen' ), get_search_query() ); ?></h1>
							<?php get_search_form(); ?>
						</div>		

					</div><!--.entry-headline -->

					<!--.<div class="section-headline">

						<div class="section-title section-center">
							<h1 class="section-name"><?= $search_label ?> <span class="search-word-mobile"><?php printf( __( '%s', 'twentyfifteen' ), get_search_query() ); ?></span></h1>
							<span class="line"></span>
							<?php get_search_form(); ?>
						</div>
						<div class="section-description">
							<span class="search-word">
								<?php printf( __( '%s', 'twentyfifteen' ), get_search_query() ); ?>
							</span>
						</div>
					</div>section-headline -->
				</header> <!--.entry-header -->

				<section class="taxonomy" style="height: 25px;"></section>
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
	?>
					</section><!-- .content-area -->

				</main><!-- .site-main -->
			</section><!-- .content-area -->

	<?php 

			// If no content, include the "No posts found" template.
		else :		

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
			
	<?php 
			get_template_part( 'content', 'none' );
	?>

					</article><!-- #post-## -->
				</main><!-- .site-main -->
			</div><!-- .content-area -->

<?php 
		endif; 
		
		$loopcounter--;

		//echo '<p>' . $post->post_type . ' - loopcounter final - ' . $loopcounter . '</p>';
		 
		if(( ( $loopcounter - 2 ) % 3 == 0 ) || ( $loopcounter == 1  )){

			$store = '<article class="block-short">
								<img src="/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg" alt="" />
								<div class="block-text">
									<span class="overtext">test1</span>
								</div>
						</article>';
						
		}else if(( $loopcounter - 1 ) % 3 == 0 ){

			$store = '<article class="block-short">				
							<img src="/wp-content/themes/dan-pearlman/img/temp/empty-1.jpg" alt="" />
							<div class="block-text">
								<span class="overtext">test1</span>
						</article>
						<article class="block-short">
								<img src="/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg" alt="" />
								<div class="block-text">
									<span class="overtext">test2</span>
								</div>
						</article>';
		}
		
?>

<script>

	/*(function($) {
		var store = <?php echo json_encode($store); ?>;
		console.log( store );
		$('section.list').append( store );
	})(jQuery);*/
	
</script>

<?php get_footer(); ?>
