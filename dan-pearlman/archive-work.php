<?php
/*
*
* The template for displaying all PROJECTS articles (archive format)
*
*/

	get_header(); 
	
	$category_image = get_template_directory_uri( ) . '/img/headers/Work.jpg';

	if(ICL_LANGUAGE_CODE == 'de'){
		$static_button = 'Weitere Projekte';
		$head_slogan   = 'Was wir machen';
		$head_text     = 'Unsere Arbeit umfasst die Vielfalt aller kreativen Disziplinen, doch am Ende des Tages machen wir nur eins: wir liefern Ergebnisse durch die Gestaltung transformativer Erlebnisse.';
	}else if(ICL_LANGUAGE_CODE == 'en'){
		$static_button = 'Next Projects';
		$head_slogan   = 'What we do';
		$head_text     = 'Our work spans all forms of creative disciplines, but at the end of the day, we only do one thing: we deliver results by creating transformative experiences.';
	}
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="section-headline">

					<div class="section-title">
						<h1 class="section-name">OUR WORK</h1>
						<span class="line"></span>
						<h1 class="section-subname"><?= $head_slogan ?></h1>
					</div>
					<div class="section-description">
						<p>							
							<?= $head_text ?>
						</p>
					</div>			

				</div><!--.entry-headline -->
			</header> <!--.entry-header -->

			<?php include("inc/taxonomy-projects-block.php"); ?>
					
			<div id="list"><!-- AJAX LOAD MORE -->
				<section class="list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="work" data-lang="<?= ICL_LANGUAGE_CODE ?>" data-category="" data-taxonomy="" data-tag="" data-search="" data-display-posts="4" data-scroll="true" data-max-pages="5" data-button-text="<?php _e($static_button, 'framework'); ?>" data-transition="fade">
					
					
				</section>
			</div><!-- /end AJAX LOAD MORE -->
					
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php  get_footer(); ?>

