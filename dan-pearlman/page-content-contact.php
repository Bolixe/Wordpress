<?php
/**
 * The template used for displaying CONTACT page 
 *
 */

	if(ICL_LANGUAGE_CODE == 'de'){ 	

	 	$title_1   = 'Kontakt';	 	 

	}else if(ICL_LANGUAGE_CODE == 'en'){
	 	
	 	$title_1   = 'Contact';	 	 

	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('grey-light'); ?>>

	<?php
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-article');
	?>

	<header class="entry-header">

		<div class="opacity-filter"></div>

		<img alt="" class="attachment-post-thumbnail wp-post-image" src="<?= $featured_image[0] ?>" />

		<div class="entry-headline">
			<?php
				the_subtitle('<h1 class="entry-subtitle">', '</h1>');
				the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</div><!--.entry-headline -->

	</header> <!--.entry-header -->


	<div class="head-overview"></div>
	<div class="entry-overview">
		<div class="entry-contact">
			<h3 class="block-title"><?= $title_1 ?></h3>

			<?php

				the_content();

			?>
		</div><!-- .entry-teaser -->

		<div class="entry-social">

			<h3 class="block-title">social media</h3>

			<a href="https://www.facebook.com/danpearlman.berlin" target="_blank" title="" class="social fb">
				<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logo-facebook.png"  alt="">
			</a>
			<a href="https://www.linkedin.com/company/dan-pearlman-gmbh" target="_blank" title="" class="social lk">
				<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logo-linkedin.png"  alt="">
			</a>
			<a href="https://www.pinterest.com/danpearlman/" target="_blank" title="" class="social pt">
				<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logo-pinterest.png"  alt="">
			</a>
			<a href="https://www.xing.com/companies/danpearlmangmbh" target="_blank" title="" class="social xg">
				<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/temp/logo-xing.png"  alt="">
			</a>

		</div><!-- .entry-tags -->
	</div><!-- .entry-overview -->


	<div class="head-overview"></div>
	<div class="entry-overview team-block">
		<h3 class="block-title">Team</h3>
	</div><!-- .entry-content -->

	<section class="entry-team">

		<?php 

		$args = array(
			'post_type' 			=> 'team',
			'category_name' 		=> $category,	
			'posts_per_page' 		=> -1,
			'orderby'   			=> 'date',
			'order'     			=> 'ASC',
			'post_status' 			=> 'publish'
		);

		
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : 

			while ( $the_query->have_posts() ) : 
				$the_query->the_post(); ?>

				<div class="person">

					<div class="opacity-filter">
						
					</div>

					<?php 
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'Large');
						$img_html = '<img src="' . $featured_image[0] . '"  alt="' . get_the_title() . '">';
						$img_html = apply_filters( 'bj_lazy_load_html', $img_html );
						echo $img_html;
				
						$positioncode = get_post_meta($post->ID, 'TEAM_POSITION', true);
					?>			

					<div class="person-data">
						<h1 class="person-name"><?= the_title() ?></h1>
						<h1 class="person-position"><?= $positioncode ?></h1>
						<h1 class="person-description"><?= the_excerpt() ?></h1>
					</div>

				</div><!-- .person -->

			<?php endwhile; ?>
			<!-- end of the loop -->

			<!-- pagination here -->

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>
		
	</section><!-- .entry-team -->

</article><!-- #post-## -->
