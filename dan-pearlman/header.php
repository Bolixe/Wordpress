<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/713788/745848/css/fonts.css" />
	<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

	<title>
		<?php

				/* Print the <title> tag based on what is being viewed. */
			global $page, $paged;

			if ( is_page('kontakt') )
				echo "Kontakt | danpearlman";
			else if ( is_page('contact') )
				echo "Contact | danpearlman";
			else if ( is_front_page() )
				echo "danpearlman";
			else
				wp_title( ' | danpearlman', true, 'right' );

			
				// Add the blog name.
			//bloginfo( 'name' );

				// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";

				// Add a page number if necessary:
			//if ( $paged >= 2 || $page >= 2 )
				//echo ' | ' . sprintf( __( 'Page %s', 'fairpixels' ), max( $paged, $page ) );
		?>
	</title>
	
	<?php wp_head(); ?>

	<!-- BEAUTY FAVICON FOR ALL DEVICES WHEN SHORTCUT TO WEB SITE -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/apple-touch-icon-120x120.png">
	<link rel="icon" type="image/png" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/manifest.json">
	<link rel="mask-icon" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#000000">
	<meta name="msapplication-config" content="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- EOF BEAUTY FAVICON  -->

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

	<div id="sidebar" class="sidebar">
		<div class="block-bar">

			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding">
					
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?= site_url() ?>/wp-content/themes/dan-pearlman/img/head-logo.png" alt="head-logo" />
						</a>
					</h1>

					<button class="secondary-toggle"><?php _e( '', 'twentyfifteen' ); ?></button>
					
				</div><!-- .site-branding -->
			</header><!-- .site-header -->

			<?php get_sidebar();  ?>

		</div><!-- .block-bar -->
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
