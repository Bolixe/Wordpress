<?php
/*
*	Template Name: Category Erlebnisarchitektur
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
		$subhead_name  = 'Über Erlebnisarchitektur';

		$cir_text_1    = 'Wir sind überzeugt, dass Zoos und Aquarien als Bildungs-, Forschungs- und Artenschutzinstitutionen sowie als Freizeitattraktionen eine Zukunft haben. Wir kennen die Herausforderungen, vor denen moderne Zoos stehen. Wir führen die komplexen Anforderungen der Tiere, der Besucher und des operativen Betriebs zusammen und bringen die Arbeit des Zoos und seine Themen den Besuchern nachhaltig näher. ';
		$cir_text_2    = 'Wir entwickeln individuelle Orte, die Raum für Entspannung und Muße, Bewegung, Gesundheit und Genuss bieten. Wir legen Wert auf Details, bereichern Spas, Hotels und Restaurants durch inspirierende Geschichten und machen sie zu einzigartigen Destinationen. ';
		$cir_text_3    = 'Wir arbeiten leidenschaftlich mit Räumen, die mehr wollen als komplexe Themen zu vermitteln, und Orten, die mehr sein wollen als ein Dach für Geschäfte und deren Kunden. Durch eine mutige strategische Ausrichtung und die Einbindung von intuitiven Elementen lassen wir die Besucher auf vielfältige Weise mit dem Ort und dem Inhalt interagieren und verführen zum Aufenthalt. ';

	}else if(ICL_LANGUAGE_CODE == 'en'){
		$static_button = 'Next Projects';
		$subhead_name  = 'About experience architecture';

		$cir_text_1    = 'We firmly believe zoos and aquariums have a future as institutions for education, research and wildlife conservation and as leisure attractions. We are versed in the challenges facing modern zoos. We unite the complex needs of the animals, visitors and commercial operations, inspiring visitors with the work of the zoo and its themes in a sustainable way. ';
		$cir_text_2    = 'We develop unique locations that offer space for relaxation and leisure, physical activity, health and enjoyment. We place great importance on details, enhancing spas, hotels and restaurants with inspiring stories, transforming them into one-of-a-kind destinations. ';
		$cir_text_3    = 'We work passionately with spaces that want to communicate more than complex themes and locations that want to be more than just a roof for businesses and their customers. Through a bold, strategic approach and the integration of intuitive elements, we create opportunities for visitors to interact in a variety of ways and the information presented, tempting them to stay.  ';

	}

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="entry-headline">
			
					<h1 class="entry-title">The Architecture of Experience</h1>
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
						<div class="circle cir-br">
						     <div class="circle-inner">
						         <div class="score-text">
						            zoo,<br>aquarium <br>& park 
						          </div>
						     </div>
						</div>
						<div class="text-circle">
							<h3 class="br"></h3>
							<p><?= $cir_text_1 ?></p>
						</div>
					</div>

					<div class="circle-block">
						<div class="circle cir-ps">
						     <div class="circle-inner">
						         <div class="score-text">
						            wellness,<br>hospitality &<br>gastronomy 
						          </div>
						     </div>
						</div>
						<div class="text-circle">
							<h3 class="ps"></h3>
							<p><?= $cir_text_2 ?></p>
						</div>
					</div>

					<div class="circle-block">
						<div class="circle cir-gs">
						     <div class="circle-inner">
						         <div class="score-text">
						            culture,<br>exhibit &<br>retail 
						          </div>
						     </div>
						</div>
						<div class="text-circle">
							<h3 class="gs"></h3>
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
