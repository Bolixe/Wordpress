<?php
/**
 * The template used for displaying ABOUT page 
 *
 */

	if(ICL_LANGUAGE_CODE == 'de'){

	 	$title_1     = 'Wir machen Marken zum Erlebnis und Erlebnisse zur Marke.';
	 	$untitle_1   = 'und vieles mehr ...';

	 	$title_2     = 'Unsere Awards';
	 	$untitle_2   = 'Design Denken';

	 	$title_3     = 'dan pearlman auf einen Blick';
	 	$untitle_3   = 'FACTS & FIGURES';	

	 	$title_4     = 'Unsere Kunden';

	 	$title_5     = 'Von Berlin aus';	 	
	 	$untitle_5   = 'arbeiten wir  international';	

	 	$glance_1    = 'MITARBEITER';	 	
	 	$glance_2    = 'REALISIERTE <br> PROJEKTE';	 	
	 	$glance_3    = 'KINDER VON <br> MITARBEITERN';	 	
	 	$glance_4    = 'NATIONALITÄTEN';	 	
	 	$glance_5    = 'QUADRATMETER';	 	
	 	$glance_6    = 'FACHDISZIPLINEN';	 	
	 	$glance_7    = 'KREIERTE IDEEN';	 	
	 	$glance_8    = 'KAFFEEMASCHINEN';	 	

	 	$head_slogan = 'Wer wir sind';
	 	$head_text   = 'dan pearlman ist eine strategische Kreativagentur. Wir helfen Marken und Unternehmen die Bedürfnisse von Menschen zu verstehen und entwickeln aus diesem Verständnis Projekte - von der Strategie über die Kreation bis zur Umsetzung - und darüber hinaus.'; 	

	}else if(ICL_LANGUAGE_CODE == 'en'){

	 	$title_1     = 'We transform brands into experiences and experiences into brands.';
	 	$untitle_1   = 'and we do much more...';

	 	$title_2     = 'Our Awards';
	 	$untitle_2   = 'Design Thinking';

	 	$title_3     = 'dan pearlman at a glance';
	 	$untitle_3   = 'FACTS & FIGURES';	

	 	$title_4     = 'Our Clients';

	 	$title_5     = 'From our Berlin offices';	 	
	 	$untitle_5   = 'We work internationally';	

	 	$glance_1    = 'EMPLOYEES';	 	
	 	$glance_2    = 'COMPLETED <br> PROJECTS';	 	
	 	$glance_3    = 'EMPLOYEES´ <br> CHILDREN';	 	
	 	$glance_4    = 'NATIONALITIES';	 	
	 	$glance_5    = 'SQUARE METERS';	 	
	 	$glance_6    = 'SUBJECT AREAS';	 	
	 	$glance_7    = 'CREATED IDEAS';	 	
	 	$glance_8    = 'COFFEE MACHINES';

	 	$head_slogan = 'Who we are';
	 	$head_text   = 'dan pearlman is a strategic creative agency. We help brands and businesses understand people’s needs and use this knowledge to develop projects – from strategy to creation, to implementation and beyond.';

	}

	$category_image = get_template_directory_uri( ) . '/img/headers/About-dan.jpg';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<div class="opacity-filter"></div>

		<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

		<div class="section-headline">

			<div class="section-title">
				<h1 class="section-name">ABOUT DAN</h1>
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


	<div class="entry-block grey-light">
		<div class="entry-areas">
			<h1 class="entry-subtitle"><?= $title_1 ?></h1>
			<?php the_content(); ?>
			<h1 class="entry-subtitle"><?= $untitle_1 ?></h1>
		</div><!-- .entry-areas -->
	</div><!-- .entry-block -->


	<div class="entry-block grey-semilight-4">
		<div class="entry-awards">
			<h1 class="entry-subtitle"><?= $title_2 ?></h1>
			<h1 class="entry-title"></h1>
			<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/awards.jpg" alt="Approachments" />	
		</div><!-- .entry-awards -->
	</div><!-- .entry-block -->


	<div class="entry-block grey-semilight-5">
		<div class="entry-glance">
			<h1 class="entry-subtitle"><?= $title_3 ?></h1>
			<h1 class="entry-title"><?= $untitle_3 ?></h1>

			<div class="tex-info-block">
				<h1>100</h1>
				<span><?= $glance_1  ?></span>
			</div>
			<div class="tex-info-block">
				<h1>1500</h1>
				<span><?= $glance_2  ?></span>
			</div>
			<div class="tex-info-block">
				<h1>55</h1>
				<span><?= $glance_3  ?></span>
			</div>
			<div class="tex-info-block">
				<h1>15</h1>
				<span><?= $glance_4  ?></span>
			</div>
			<div class="tex-info-block">
				<h1>1870</h1>
				<span><?= $glance_5  ?></span>
			</div>
			<div class="tex-info-block">
				<h1>20</h1>
				<span><?= $glance_6  ?></span>
			</div>
			<div class="tex-info-block">
				<h1>1 000 000</h1>
				<span><?= $glance_7  ?></span>
			</div>
			<div class="tex-info-block">
				<h1>5</h1>
				<span><?= $glance_8  ?></span>
			</div>
		</div><!-- .entry-glance -->
	</div><!-- .entry-block -->


	<div class="entry-block grey-semilight-3">
		<div class="entry-map-concept">
			<h1 class="entry-subtitle"><?= $title_5 ?></h1>
			<h1 class="entry-title"><?= $untitle_5 ?></h1>
			<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/about-map.png" alt="Approachments" />	
		</div><!-- .entry-map-concept -->
	</div><!-- .entry-block -->

	<div class="entry-block grey-semilight-2">
		<div class="entry-logos">
			<h1 class="entry-subtitle"><?= $title_4 ?></h1>
			<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/unsere_kunden.png" alt="Approachments" />	
		</div><!-- .entry-logos -->
	</div><!-- .entry-block -->


</article><!-- #post-## -->
