<?php
/*
*
* The template for displaying all NEWS articles (archive format)
*
*/

	get_header(); 

	$category_image = get_template_directory_uri( ) . '/img/headers/News_Header.jpg';

	if(ICL_LANGUAGE_CODE == 'de'){
		$static_button = 'Weitere News';
		$placeholder   = 'Ihre E-Mail-Adresse';
		$head_slogan   = 'Schon gehört?';
		$head_text     = 'Lernen Sie neue Projekte kennen, werfen Sie einen Blick hinter die Kulissen und erfahren Sie Trends und Entwicklungen aus der Marken- und Erlebniswelt. ';
	}else if(ICL_LANGUAGE_CODE == 'en'){
		$static_button = 'Next News';
		$placeholder   = 'Your e-mail address';
		$head_slogan   = 'Already heard?';
		$head_text     = 'Learn about new projects, take a look behind the scenes and learn about trends and developments of brand- and experience architecture.';
	}
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="section-headline">

					<div class="section-title">
						<h1 class="section-name">OUR NEWS</h1>
						<span class="line"></span>
						<h1 class="section-subname"><?= $head_slogan ?></h1>
					</div>
					<div class="section-description">
					<?php
						if(is_active_sidebar('sidebar-3')){

							dynamic_sidebar('sidebar-3'); 

						}else{
					?>
						<p>
							<?= $head_text ?>
						</p>
					<?php
						}
					?>
					</div>
					
				</div><!--.section-headline -->
			</header> <!--.entry-header -->


			<?php include("inc/taxonomy-news-block.php"); ?>		

			<div id="list"><!-- AJAX LOAD MORE -->
				<section class="list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="news" data-lang="<?= ICL_LANGUAGE_CODE ?>" data-category="" data-taxonomy="" data-tag="" data-search="" data-display-posts="4" data-scroll="true" data-max-pages="5" data-button-text="<?php _e($static_button, 'framework'); ?>" data-transition="fade">
										
				</section>
			</div><!-- /end AJAX LOAD MORE -->
					
		</main><!-- .site-main -->
	</div><!-- .content-area -->

	<script type="text/javascript">

		(function($) {
			$(document).ready(function(){

				$('.alo_easymail_form_table tr td #opt_email').attr('placeholder', '<?= $placeholder ?>');

			});
		})(jQuery);

	</script>

<?php  get_footer(); ?>

