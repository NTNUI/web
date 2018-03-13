<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shapely
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'shapely' ); ?></a>

	<header id="masthead" class="site-header<?php echo get_theme_mod( 'mobile_menu_on_desktop', false ) ? ' mobile-menu' : ''; ?>" role="banner">
		<div class="nav-container">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="container nav-bar">
					<div class="flex-row">
						<div class="module left site-title-container">
							<?php shapely_get_header_logo(); ?>
						</div>
						<div class="module widget-handle mobile-toggle right visible-sm visible-xs">
							<i class="fa fa-bars"></i>
						</div>
						<div class="module-group right">
							<div class="module left">
								<?php shapely_header_menu(); ?>
							</div>
							<!--end of menu module-->
							
						</div>
						<!--end of module group-->
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<div id="content" class="main-container">
		<?php if ( ! is_page_template( 'page-templates/template-home.php' ) && ! is_404() && ! is_page_template( 'page-templates/template-widget.php' ) ) : ?>
		
		<?php endif; ?>

		<section class="content-area <?php echo ( get_theme_mod( 'top_callout', true ) ) ? '' : ' pt0 '; ?>">
			<div id="main" class="<?php echo ( ! is_page_template( 'page-templates/template-home.php' ) && ! is_page_template( 'page-templates/template-widget.php' ) ) ? 'container' : ''; ?>" role="main">
