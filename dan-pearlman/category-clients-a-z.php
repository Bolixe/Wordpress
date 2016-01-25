<?php
/*
*	Template Name: Category clients
*
*	Specific template for all subcategories of clients
*/

	get_header(); 

	$cat      = get_queried_object(); 
	$cat_slug = $cat->slug;
	$cat_name = $cat->cat_name;
	$cat_desc = $cat->category_description;

	$category_image = get_template_directory_uri( ) . '/img/headers/Clients.jpg';

	if(ICL_LANGUAGE_CODE == 'de'){
		$head_slogan   = 'Mit wem wir arbeiten';
		$head_text     = 'Von A wie Airline über K wie Klinik bis Z wie Zoo: <br> wir arbeiten für und mit Kunden aus den Bereichen Mode, Mobilität, Finanzen, Freizeit und Erlebnis.<br> Und vielen mehr.';
	}else if(ICL_LANGUAGE_CODE == 'en'){
		$head_slogan   = 'With whom we work ';
		$head_text     = 'From A for Airline to C for Clinic to Z for Zoo: we work for clients from the worlds of fashion, mobility, finance, leisure and immersive environments.<br> And many others.';
	}
    
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">	

			<header class="entry-header">
	
				<div class="opacity-filter"></div>

				<img src="<?= $category_image ?>" class="attachment-post-thumbnail wp-post-image" alt="">

				<div class="section-headline">

					<div class="section-title">
						<h1 class="section-name">OUR CLIENTS</h1>
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
			
			<?php include("inc/taxonomy-projects-block.php"); ?>

			<section class="list">

				<?php 	
					
					$argv   =   array( 'child_of' => 90);
                    
                    $custom_order   =   isset($_GET['_order'])  ?   $_GET['_order'] :   '';
           
                    $argv['orderby']            =   'name';
                    $argv['order']              =   'ASC';
                    $argv['ignore_custom_sort'] =   TRUE;
                  
                    $children = get_categories($argv);

					foreach ($children as $child) {

					    $child = get_category( $child ); 					    					  

						if (function_exists('z_taxonomy_image')){																						
							$category_image = z_taxonomy_image_url(  $child->term_id, 'list-smaller' );
							$img_html       = '<img src="' . $category_image . '" alt="" />';
							$img_html       = apply_filters( 'bj_lazy_load_html', $img_html );
						} 

					?>
						<article class="block-short">
							<a href="<?= get_category_link( $child->term_id ) ?>">
								<?= $img_html ?>
								<div class="block-text single-title">
									<span class="overtitle"><?= $child->cat_name ?></span>
									<span class="details-link">View the projects</span>
								</div>
								<span class="opacity-filter"></span >
							</a>
						</article>    						   					
				<?php			
					}
				?>
			</section><!--#list -->
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
