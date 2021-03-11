<?php
/**
 * The template for displaying the header
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<header id="masthead" class="site-header" role="banner">

		<div class="site-header-main">

			<div class="site-branding">
			</div><!-- .site-branding -->

			<?php if ( has_nav_menu( 'header-menu' ) ) { ?>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'header-menu',
							'menu_class'     => 'primary-menu',
						) );
					?>
				</nav><!-- .main-navigation -->
			<?php } ?>

		</div><!-- .site-header-main -->

	</header><!-- .site-header -->

	<div id="content" class="site-content">
