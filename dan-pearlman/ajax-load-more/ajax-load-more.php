<?php
/*
 * Wordpress Ajax Load More
 * https://github.com/dcooney/wordpress-ajax-load-more
 *
 * Copyright 2014 Connekt Media - http://cnkt.ca/ajax-load-more/
 * Free to use under the GPLv2 license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Author: Darren Cooney
 * Twitter: @KaptonKaos
*/

// ---------------------------------- //
// - Load wp-load.php from the WordPress root directory
// ---------------------------------- //

define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');


// ---------------------------------- //
// - Set up our variables from ajax-load-more.js
// ---------------------------------- //

$postType  = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$language  = (isset($_GET['lang'])) ? $_GET['lang'] : 'post';
$category  = (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id = (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy  = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag       = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$s         = (isset($_GET['search'])) ? $_GET['search'] : '';
$exclude   = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$numPosts  = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 6;
$page      = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
$offset    = (isset($_GET['offset'])) ? $_GET['offset'] : 0;

// ---------------------------------- //
// - Set up initial args
// ---------------------------------- //

if ($language) 
	$filters = false;
else  
	$filters = true;


$args = array(
	'post_type' 			=> $postType,
	'category_name' 		=> $category,	
	'author'				=> $author_id,
	'posts_per_page' 		=> $numPosts,
	//'paged'          		=> $page, Removed in favour of 'offset', seems to work nicely.
	'offset'                => $offset + ($numPosts*$page),
	's'          			=> $s,	
	'orderby'   			=> 'date',
	'order'     			=> 'DESC',
	'post_status' 			=> 'publish',
	'suppress_filters'      => $filters,
	'ignore_sticky_posts' 	=> true
);


// ---------------------------------- //
// - Excluded Posts Example Function
// ---------------------------------- //

/* Create new array of excluded posts.
for example, you may have a feature post rotator on the page and you may want to exclude these posts in your query.

Example post array:
$features = array('7238', '6649', '6951'); // Array of posts
if($features){			
   $postsNotIn = implode(",", $features); //Implode the posts and set a varible to pass to our data-post-not-in param.
}   
Example HTML
<ul class="listing" data-path="<?php echo get_template_directory_uri(); ?>" data-post-type="post" data-post-not-in="<?php echo $postsNotIn; ?>" data-display-posts="6" data-button-text="Load More">

*/

// - Exclude posts if needed

if(!empty($exclude)){
	$exclude=explode(",",$exclude);
	$args['post__not_in'] = $exclude;
}

// - Query by Taxonomy

if(empty($taxonomy)){
	$args['tag'] = $tag;
}else{
    $args[$taxonomy] = $tag;
}


// The Query
$the_query = new WP_Query( $args );

// ---------------------------------- //
// - Run our loop
// ---------------------------------- //
$loopcounter = 1;
if ($the_query->have_posts()) :

	while ($the_query->have_posts()): 

		$the_query->the_post();

		$post->lng    = $language;
		$post->total  = $numPosts;
		$post->looper = $loopcounter;

		$loopcounter++; 

			// - Run the repeater
		get_template_part( '/ajax-load-more/includes/list-elements'); 

	endwhile; 
endif;

$loopcounter--;

 //echo '<p>' . $postType[0] . ' - ' . $numPosts . ' - loopcounter final - ' . $loopcounter . '</p>';
 
if(( $loopcounter == 2 ) && ( $postType[0] == 'jobs' )){

	$store = '<article class="block-short">
						<img src="/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg" alt="" />
						<div class="block-text">
							<span class="overtext">test1</span>
						</div>
				</article>';
				
}else if(( $loopcounter == 1 ) && ( $postType[0] == 'jobs' )){

	$store = '<article class="block-short">				
					<img src="/wp-content/themes/dan-pearlman/img/temp/empty-1.jpg" alt="" />
					<div class="block-text">
						<span class="overtext">test1</span>
				</article>
				<article class="block-short">
						<img src="/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg" alt="" />
						<div class="block-text">
							<span class="overtext">test2</span>
						</div>
				</article>';
}

//echo $store;

wp_reset_query(); 

?> 


