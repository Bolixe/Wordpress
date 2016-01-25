<?php
/**
 * The template for displaying detail page of jobs
 *
 */

	if (ICL_LANGUAGE_CODE == 'de') {
		$ti_teaser  = 'Überblick';
		$ti_content = 'Verantwortungen';
		$ti_related = '';
		$ti_whowe   = 'Wer wir sind';
		$ti_behind  = 'LEBENS AUF DAN PEARLMAN';
	} elseif (ICL_LANGUAGE_CODE == 'en') {
		$ti_teaser  = 'Overview';
		$ti_content = 'Responsibilities';
		$ti_related = '';
		$ti_whowe   = 'Who we are';
		$ti_behind  = 'LIFE AT DAN PEARLMAN';
	}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-project'); ?>> 

	<?php
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-article');	
	?>

	<header class="entry-header">
	
		<div class="opacity-filter"></div>

		<img alt="" class="attachment-post-thumbnail wp-post-image" src="<?= $featured_image[0] ?>" />

		<div class="entry-headline">
			<?php

				// Get slideshow shortcode
				the_title( '<h1 class="entry-subtitle">', '</h1>' );

				the_subtitle('<h1 class="entry-title">', '</h1>');				
			?>
		</div><!--.entry-headline -->
	</header> <!--.entry-header -->

	<div class="head-overview"></div>
	<div class="entry-overview">

		<div class="entry-teaser">
			<h3 class="block-title"><?= $ti_teaser ?></h3>

			<?php

				the_excerpt('<p class="entry-excerpt">', '</p>' );

			?>
		</div><!-- .entry-teaser -->

		<div class="entry-tags">

			<h3 class="block-title">TYPE</h3>

			<div class="cloud-tags">

				<?php tags_custom_taxonomy( 'type' ); ?>

			</div>

		</div><!-- .entry-tags -->

	</div><!-- .entry-overview -->

	<div class="white">
		<div class="entry-content entry-job">

			<h3 class="block-title"><?= $ti_content ?> :</h3>

			<?php
			
				the_content( );
			?>

		</div><!-- .entry-content -->
	</div><!-- .white -->

	<div class="entry-content content-column">

		<h3 class="block-title"><?= $ti_whowe  ?> :</h3>

	
		<?php if (ICL_LANGUAGE_CODE == 'de') { ?>

			<p>
				dan pearlman steht für strategisches und kreatives Denken und Handeln. Hier sind Kollegen keine Konkurrenten, 
				sondern arbeiten gemeinsam disziplinübergreifend und in internationalen Teams. Es geht uns um die bestmöglichen, innovativsten 
				und dabei nachhaltigsten Ergebnisse. Um diese zu ermöglichen, bietet unsere inhabergeführte Agentur großzügige, helle Räume mit 
				sehr gut ausgestatteten Arbeitsplätzen - mit Blick auf den Fernsehturm. Dazu gibt es Kreativräume, Küchen sowie einen grünen 
				Dachgarten mit Obst und Gemüse. Wir unterstützen unsere Mitarbeiter mit gezielten Weiterbildungen, Gesundheitsmanagement und 
				verschiedenen Modellen zu flexiblen Arbeitszeiten dabei, einen Ausgleich zwischen Arbeit, Familie und Freizeit zu finden. 
				Spannende Projekte, flache Hierarchien und unsere Unternehmenskultur der Vielfalt, Verantwortung und Offenheit sorgen dafür, 
				dass der Arbeitsalltag bei dan stets aufregend bleibt.
			</p>

		<?php }else if (ICL_LANGUAGE_CODE == 'en') { ?>

			<p>
				dan pearlman stands for strategic and creative thinking and acting. At our agency, colleagues aren’t competition but 
				work together in interdisciplinary and international teams. We are concerned with the best possible, most innovative and at the same 
				time sustainable results. To enable these kind of results, our owner-led company offers spacious, bright rooms with well-equipped 
				workplaces – including a view to Berlin’s TV Tower. Besides, there are creative spaces, some kitchens and a “green oasis” on our 
				roof garden with fruits and vegetables. With specific training measures, health management and several models of flexible working 
				hours we support our employees in finding a balance between work, family and leisure time. Due to exciting projects, flat hierarchies 
				and our corporate culture characterized by diversity, responsibility and openness the daily work routine never gets dull.
			</p>

		<?php } ?>

	</div><!-- .entry-content -->

	<?php	
		if ( extra_images_exists() ) {
	?>
		<div class="entry-extras">
			<div class="behind-scenes">
				<h3 class="block-title"><?= $ti_behind ?></h3>
				<?php
					get_extra_images();
				?>
			</div><!-- .behind-scenes -->
		</div><!-- .entry-extras -->
	<?php
		}
	?>

</article><!-- #post-## -->

