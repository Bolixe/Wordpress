<?php
/*
*
* The template for displaying all JOBS articles (archive format)
*
*/

	get_header(); 

	$category_image = get_template_directory_uri( ) . '/img/headers/Jobs.jpg';


	 if(ICL_LANGUAGE_CODE == 'de'){
	 	$static_button = 'Mehr Jobs';
	 	$head_slogan   = 'Arbeite mit uns';
	 	$head_text     = 'Spannende Projekte und das Arbeiten im Team sind genau dein Ding? Wir sind immer auf der Suche nach Kreativen, Planern und Managern aus allen Disziplinen.';
	 }else if(ICL_LANGUAGE_CODE == 'en'){
	 	$static_button = 'Next Jobs';
	 	$head_slogan   = 'Work with us';
	 	$head_text     = 'Exciting projects and teamwork are just your thing? We’re constantly on the lookout for creatives, planners and managers from all disciplines.';
	 }
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="section-headline">

					<div class="section-title">
						<h1 class="section-name">YOUR CAREER</h1>
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

			<?php include("inc/taxonomy-jobs-block.php"); ?>

			<div id="list"><!-- AJAX LOAD MORE -->
				<section class="list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="jobs" data-lang="<?= ICL_LANGUAGE_CODE ?>" data-category="" data-taxonomy="" data-tag="" data-search="" data-display-posts="4" data-scroll="true" data-max-pages="5" data-button-text="<?php _e($static_button, 'framework'); ?>" data-transition="fade">
					
				</section>
			</div><!-- /end AJAX LOAD MORE -->
					
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php  get_footer(); ?>

