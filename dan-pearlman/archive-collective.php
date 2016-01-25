<?php
/*
*
* The template for displaying all COLLECTIVES articles (archive format)
*
*/


	get_header(); 

	$category_image = get_template_directory_uri( ) . '/img/headers/Collective.jpg';

	if(ICL_LANGUAGE_CODE == 'de'){
	 	$static_button = 'Weitere Projekte';
	 	$head_slogan   = 'Was wir noch machen';
	 	$head_text 	   = 'Auch jenseits der Projektarbeit setzen wir auf Kreativität und Nachhaltigkeit. Engagieren uns, erweitern unseren Horizont und den von anderen.';
	}else if(ICL_LANGUAGE_CODE == 'en'){
	 	$static_button = 'Next Projects';
	 	$head_slogan   = 'What else we do';
	 	$head_text     = 'Even outside of our project-based work we focus on creativity and sustainability. Engage with us, broaden our horizons and those of others. ';
	}
	
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="section-headline">

					<div class="section-title">
						<h1 class="section-name">OUR COLLECTIVE</h1>
						<span class="line"></span>
						<h1 class="section-subname"><?= $head_slogan ?></h1>
					</div>
					<div class="section-description">
						<p>
							<?= $head_text ?>
						</p>
					</div>					

				</div><!--.section-headline -->
			</header> <!--.entry-header -->

			<?php include("inc/taxonomy-collectives-block.php"); ?>
					
			<div id="list"><!-- AJAX LOAD MORE -->
				<section class="list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="collective" data-lang="<?= ICL_LANGUAGE_CODE ?>" data-category="" data-taxonomy="" data-tag="" data-search="" data-display-posts="4" data-scroll="true" data-max-pages="5" data-button-text="<?php _e($static_button, 'framework'); ?>" data-transition="fade">
					
					
				</section>
			</div><!-- /end AJAX LOAD MORE -->
					
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php  get_footer(); ?>

