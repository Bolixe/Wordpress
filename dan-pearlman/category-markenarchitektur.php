<?php
/*
*	Template Name: Category Markenarchitektur
*
*/
	get_header(); 

	$cat      = get_queried_object(); 
	$cat_slug = $cat->slug;
	$cat_name = $cat->cat_name;
	$cat_desc = $cat->category_description;

	if (function_exists('z_taxonomy_image')){																	
		$category_image = z_taxonomy_image_url(  $cat->term_id, 'header-article' );

		if( $category_image == '')
			$category_image = site_url() . '/wp-content/uploads/2015/06/work-header-1440x465.jpg';
	}

	if(ICL_LANGUAGE_CODE == 'de'){
		$static_button = 'Weitere Projekte';
		$subhead_name  = 'Über Markenarchitektur';

		$cir_title_1   = 'Strategie';
		$cir_title_2   = 'Kommunikation';
		$cir_title_3   = 'Erlebnis';

		$cir_text_1    = 'Wir sind überzeugt, dass jede Marke eine individuelle und nachhaltige Strategie benötigt, um langfristig erfolgreich zu sein. Nur ein durchdachter strategischer Plan sorgt für Stabilität und Konsistenz des Markeneindrucks an den Berührungspunkten mit der Marke entlang der Customer Journey. Für die Architektur der Marke ist die Strategie das Fundament des Markenhauses.';
		$cir_text_2    = 'Wir entwickeln die Kommunikation einer Marke allumfassend und für alle Kommunikationskanäle. Von der passenden Sprache, über emotionale Bilderwelten, bis hin zur Kommunikation in allen Kanälen, denken wir Kommunikation immer vernetzt. Im Austausch zwischen Marke und Mensch geht es für uns nicht nur um die Vermittlung von Informationen, sondern vor allem um den Transfer von Emotionen.';
		$cir_text_3    = 'Wir schaffen Räume für Marken, die ein umfassendes Markenerlebnis garantieren. Ob mobil, temporär, stationär oder virtuell, ob Event, Akademie, Messestand, Office, Shop oder Showroom - ein Markenerlebnis kann viele Ausprägungen und Facetten haben. Immer aber ist er der Ort, an dem die Marke zuhause ist. Hier wird sie zum Gastgeber und ihre Gäste erleben sie gleichermaßen ehrlich wie emotional.';

	}else if(ICL_LANGUAGE_CODE == 'en'){
		$static_button = 'Next Projects';
		$subhead_name  = 'About Brand Experience';

		$cir_title_1   = 'Strategy';
		$cir_title_2   = 'Communication';
		$cir_title_3   = 'Experience';

		$cir_text_1    = 'We are convinced that every brand needs an individual and sustainable strategy to be successful in the long run. Only a thought-through strategic plan provides stability and consistency of the overall impression of a brand, through constant touch points with the brand along the customer journey. For the architecture of the brand; strategy is the substance of the brand house.';
		$cir_text_2    = 'We develop the communication of a brand comprehensively and for all communication channels. From the appropriate language, to emotional imagery, to communication in all channels; we think communication is always linked. In altercation between brand and human we are not solely dependent on providing information, but rather to transfer emotions.';
		$cir_text_3    = 'We create spaces for brands that guarantee a comprehensive brand experience. Regardless whether: mobile, temporary, stationary or virtually, whether it is an event, academy, exhibition stand, office, shop or showroom - a brand experience can take many forms and facets. Nonetheless it is always the place where the brand is at home. Here the brand turns into being a host and the guests experience it both honest and emotional.';
	}

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="entry-headline">
			
					<h1 class="entry-title">The Architecture of Brands</h1>
					<h1 class="entry-subtitle"><?= $subhead_name ?></h1>

				</div><!--.entry-headline -->
			</header> <!--.entry-header -->

			<?php include("inc/taxonomy-projects-block.php"); ?>

		
			<div class="entry-overview-text-wide">
				<div class="entry-text-wide">

					<p><?= $cat_desc ?></p>

				</div><!-- .entry-teaser -->				
			</div><!-- .entry-overview -->

			<div class="entry-block grey-dark2">
				<div class="entry-circles">
					<div class="circle-block">
						<div class="circle cir-gn">
						     <div class="circle-inner">
						         <div class="score-text-2">
						            <?= $cir_title_1  ?>
						          </div>
						     </div>
						</div>
						<div class="text-circle">
							<h3 class="gn"></h3>
							<p><?= $cir_text_1 ?></p>
						</div>
					</div>

					<div class="circle-block">
						<div class="circle cir-tq">
						     <div class="circle-inner">
						         <div class="score-text-2">
						            <?= $cir_title_2  ?>
						          </div>
						     </div>
						</div>
						<div class="text-circle">
							<h3 class="tq"></h3>
							<p><?= $cir_text_2 ?></p>
						</div>
					</div>

					<div class="circle-block">
						<div class="circle cir-pl">
						     <div class="circle-inner">
						         <div class="score-text-2">
						            <?= $cir_title_3  ?>
						          </div>
						     </div>
						</div>
						<div class="text-circle">
							<h3 class="pl"></h3>
							<p><?= $cir_text_3 ?></p>
						</div>
					</div>
				</div><!--.entry-rounded -->
			</div><!--.entry-block -->

			<div id="list"><!-- AJAX LOAD MORE -->
				<section class="list" data-path="<?php echo get_template_directory_uri(); ?>/ajax-load-more" data-post-type="work" data-lang="" data-category="<?= $cat_slug ?>" data-taxonomy="category" data-tag="" data-search="" data-display-posts="4" data-scroll="true" data-max-pages="5" data-button-text="<?php _e($static_button, 'framework'); ?>" data-transition="fade">
										
				</section>
			</div><!-- /end AJAX LOAD MORE -->
			
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php  get_footer(); ?>
