<?php
/*
*	Template Name: Taxonomy tag 
*
*	Template for wp taxonomy tags from projects
*/

	get_header(); 

	$tag      = get_queried_object(); 
	$tag_slug = $tag->slug;
	$tag_name = $tag->name;
	$tag_desc = $tag->description;

	if (function_exists('z_taxonomy_image')){																	
		$category_image = z_taxonomy_image_url(  $tag->term_id, 'header-article' );

		if( $category_image == '')
			$category_image = site_url() . '/wp-content/uploads/2015/06/work-header-1440x465.jpg';
	}

	$tag_args = array( 'smallest' => 10, 'largest' => 10, 'format' => 'list','taxonomy' => 'post_tag', 'child_of' => null);

	$cat_args = array( 'smallest' => 10, 'largest' => 10, 'orderby' => 'term_id', 'include' => array('90', '97', '102', '103'), 'taxonomy' => 'category', 'child_of' => null); 
	

	if(ICL_LANGUAGE_CODE == 'de')
		$static_button = 'Weitere Projekte';
	else if(ICL_LANGUAGE_CODE == 'en')
		$static_button = 'Next Projects';

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<!--<img alt="Lufthansa_01" class="attachment-post-thumbnail wp-post-image" src="<?= $category_image ?>" />-->
				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="entry-headline">

					<h1 class="entry-subtitle"> <?= $tag_name ?></h1>
					<p class="section-resume"> <?= $tag_desc ?></p>	

				</div><!--.entry-headline -->
			</header> <!--.entry-header -->

			<?php include("inc/taxonomy-projects-block.php"); ?>

			<div id="list"><!-- AJAX LOAD MORE -->
				<section class="list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="work" data-lang="" data-category="" data-taxonomy="" data-tag="<?= $tag_slug ?>" data-search="" data-display-posts="4" data-scroll="true" data-max-pages="5" data-button-text="<?php _e($static_button, 'framework'); ?>" data-transition="fade">
					
					
				</section>
			</div><!-- /end AJAX LOAD MORE -->
			
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>

