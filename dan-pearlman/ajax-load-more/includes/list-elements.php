<?php

	if ($post->lng) 	// IF languague parameter. Get the post ID of translated post			
		$ID = icl_object_id( $post->ID, get_post_type( $post->ID ), false, $post->lng );
	else				// IF languague parameter. Get the post ID of translated post	
		$ID = $post->ID;
	
	$extraclass = '';

		// Specific tag
	if(( $post->post_type == 'work' ) || ( $post->post_type == 'collective' ) || ( $post->post_type == 'collective-en' ))
		$viewtag = 'Project';
	else if( $post->post_type == 'jobs'){
		$viewtag    = 'Description';
		$extraclass = 'text-break';
	}else if( $post->post_type == 'news')
		$viewtag = 'News';

		// 1 and 4 block should be widther
	if ( ( ( $post->looper == 1 ) || ( $post->looper == 4 ) ) && ( $post->post_type != 'jobs' ) ) {
		//if ( ( ( $post->looper == 1 ) || ( $post->looper == 4 ) ) && ( $post->total == 4 ) && ( $post->post_type != 'jobs' ) ) {
	
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-big');

		if ($featured_image[0] == '')
			$featured_image[0] = '/wp-content/themes/dan-pearlman/img/temp/empty-large-3.jpg';

		$img_html       = '<img class="big-image" src="' . $featured_image[0] . '" alt="" />';
		$img_html       = apply_filters( 'bj_lazy_load_html', $img_html );

		$hidden_image   = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-smaller');

		if ($hidden_image[0] == '')
			$hidden_image[0] = '/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg';

		$img_hidden     = '<img class="small-hidden" src="' . $hidden_image[0] . '" alt="" />';
		$img_hidden     = apply_filters( 'bj_lazy_load_html', $img_hidden );
?>
		<article class="block-long">
			<a href="<?= get_permalink( $ID ) ?>">
				<?= $img_html ?>
				<?= $img_hidden ?>
				<div class="block-text">

					<span class="overtext"><?= get_the_subtitle( $ID ) ?></span>

					<?php 
						if( $post->post_type == 'news'){ 	// IF news get specific headline
					?>
							<span class="text"><?= get_post_meta( $ID, 'NEWS_HEADER_TITLE', true ); ?></span>
					<?php
						}else{ 								// Otherwise print the title 
					?>						
							<span class="text <?= $extraclass ?>"><?= get_the_title( $ID ); ?></span>
					<?php
						}
					?>

					<span class="details-link">View the <?= $viewtag ?></span>
				</div>
				<span class="opacity-filter"></span >
			</a>
		</article>
<?php 
		// The rest are normal block
	}else{

		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-smaller');

		if ($featured_image[0] == '')
			$featured_image[0] = '/wp-content/themes/dan-pearlman/img/temp/empty-3.jpg'; 
		
		$img_html       = '<img src="' . $featured_image[0] . '" alt="" />';
		$img_html       = apply_filters( 'bj_lazy_load_html', $img_html );

?>
		<article class="block-short">
			<a href="<?= get_permalink( $ID ) ?>">
				<?= $img_html ?>
				<div class="block-text">

					<?php 
						if( $post->post_type != 'jobs'){ 		// Jobs has not subtitle
					?>
							<span class="overtext"><?= get_the_subtitle( $ID ) ?></span>
					<?php
						}else if( $post->post_type == 'jobs'){ 		// Jobs has not subtitle			
					?>
							<span class="overtext <?= $extraclass ?>"><?= get_the_title( $ID ) ?></span>
					<?php
						}

						if( $post->post_type == 'news'){		// IF news get specific headline
					?>
							<span class="text"><?= get_post_meta( $ID, 'NEWS_HEADER_TITLE', true ); ?></span>
					<?php
						}else if( $post->post_type != 'jobs'){ 		// Jobs has not subtitle
					?>
							<span class="text"><?= get_the_title( $ID ); ?></span>
					<?php
						}
					?>
					<span class="details-link">View the <?= $viewtag ?></span>
				</div>
				<span class="opacity-filter"></span >
			</a>
		</article>
<?php

	}
?>
