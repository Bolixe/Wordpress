<?php
/*
*	Template Name: Taxonomy block html 
*
*	Template for reuse the filters block in code
*/
?>

<section class="taxonomy">
				
	<div class="tags-list">
		<span>Filters <b>+</b></span>
		<div class="tags-toggle">
			<?php
				$tag_args = array( 'smallest' => 10, 'largest' => 10, 'format' => 'list','taxonomy' => 'type', 'child_of' => null);
				wp_tag_cloud( $tag_args );  
			?>
		</div>
	</div>

	<?php 
						// (System function) $cat_args = array( 'smallest' => 10, 'largest' => 10, 'orderby' => 'term_id', 'include' => array('107', '108', '109', '110'), 'taxonomy' => 'kind', 'child_of' => null); 

			// Instead of using wp we build it manually, taking in count if translation needs to be call
		$id_categories = lang_object_ids(array( 420, 421), 'kind');  
		$links_categ   = '';


			// Handle the base url depending of the language
		if(ICL_LANGUAGE_CODE == 'de')
			$basepath     = site_url();
		else if(ICL_LANGUAGE_CODE == 'en')
			$basepath     = site_url() . "/en";
		
		foreach ($id_categories as $categ) { 

			$catobject    = get_term_by('id', $categ, 'kind');
			$links_categ .= '<a title="" class="tag-link-' . $catobject->term_taxonomy_id . '" href="' . $basepath . '/kind/' . $catobject->slug . '/">' . $catobject->name . '</a>'; 
		}
	?>

	<div class="categories">
		<span>Sort by <i>:</i> <b>+</b></span>
		<div class="categories-toggle">					
			<?=  $links_categ ?>
		</div>
	</div>

</section><!--.taxonomy -->	

<script>

	(function($) {
		$(document).ready(function(){ 									// After ready bind this events
			$('div.tags-list span').click(function(){					// Show or hide filter tags when clicked

				if ( $('div.tags-toggle').css('display') == 'block' ){				
					$('div.tags-list span b').text('+');
					$('div.tags-toggle').slideToggle();
				}else{
					$('div.tags-list span b').text('-');
					$('div.tags-toggle').slideToggle();
				}
			});

			$('div.categories span').click(function(){					// Show or hide filter categories after size of window < 602

				if ($(window).width( ) <= 602) {
					if ( $('div.categories-toggle').css('display') == 'block' ){				
						$('div.categories span b').text('+');
						$('div.categories-toggle').slideToggle();
					}else{
						$('div.categories span b').text('-');
						$('div.categories-toggle').slideToggle();
					}
				}
			});
		});
	})(jQuery);

</script>