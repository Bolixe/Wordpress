<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

	if(( $post->post_type == 'work' ) || ( $post->post_type == 'collective' ) )
		$viewtag = 'the Project';
	else if( $post->post_type == 'jobs')
		$viewtag = 'the Description';
	else if( $post->post_type == 'news')
		$viewtag = 'the News';
	else if( $post->post_type == 'page')
		$viewtag = 'the Page';
	else 
		$viewtag = '';


	if( $post->post_type != 'page'):

		//echo $wp_query->post_count . " AAA " . $post->looper;

		if ( $wp_query->post_count <= 2 ) {
			if ( $post->looper == 1) {

				$block_class = 'block-long';

				$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-big');
				if ($featured_image[0] == '')
					$featured_image[0] = '/wp-content/themes/dan-pearlman/img/temp/empty-large-3.jpg';
					
				$hidden_image   = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-smaller');

				if ($hidden_image[0] == '')
					$hidden_image[0] = '/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg';

				$img_hidden     = '<img class="small-hidden" src="' . $hidden_image[0] . '" alt="" />';
				$img_hidden     = apply_filters( 'bj_lazy_load_html', $img_hidden );
				
			}else if ( $post->looper == 2) {
				$block_class = 'block-short';
				$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-smaller');
				if ($featured_image[0] == '')
					$featured_image[0] = '/wp-content/themes/dan-pearlman/img/temp/empty-2.jpg';
			}
		}else{
			$block_class = 'block-short';

			$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-smaller');
			if ($featured_image[0] == '')
				$featured_image[0] = '/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg';
		}	
?>

	<article id="post-<?php the_ID(); ?>" class="search-block <?= $block_class ?>">

		<?php
			$img_html = '<img class="big-image" src="' . $featured_image[0] . '" alt="" />';
			$img_html = apply_filters( 'bj_lazy_load_html', $img_html );
		?>
		
		<a href="<?= get_permalink( $post->ID ) ?>">
			<?= $img_html ?>
			<?= $img_hidden ?>
			<div class="block-text">
				<?php 
					if( $post->post_type != 'jobs'){ 			// Jobs has not subtitle
				?>
						<span class="overtext"><?= get_the_subtitle( $ID ) ?></span>
				<?php
					}else if( $post->post_type == 'jobs'){ 		// Jobs has not subtitle			
				?>
						<span class="overtext <?= $extraclass ?>"><?= get_the_title( $ID ) ?></span>
				<?php
					}
					if( $post->post_type == 'news'){			// IF news get specific headline
				?>
						<span class="text"><?= get_post_meta( $ID, 'NEWS_HEADER_TITLE', true ); ?></span>
				<?php
					}else if( $post->post_type != 'jobs'){ 		// Jobs has not subtitle
				?>
						<span class="text"><?= get_the_title( $ID ); ?></span>
				<?php
					}
				?>
				<span class="details-link">View <?= $viewtag ?></span>
			</div>
			<span class="opacity-filter"></span >
		</a>

	</article><!-- #post-## -->


<?php endif; ?>