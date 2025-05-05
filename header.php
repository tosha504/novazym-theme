<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package novazyn
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="wrapper">

		<header id="masthead" class="header">
			<div class="container">
				<?php
				$logo = get_field('logo_header', 'options');
				if ($logo) { ?>
					<div class="header__logo">
						<a href="<?php echo esc_url(home_url('/')) ?>" title="Go to homepage"
							rel="noopener noreferrer"
							target="_self">
							<?php
							echo wp_get_attachment_image($logo, 'full');
							?>
						</a>
					</div> <!-- header-logo -->
				<?php } ?>
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-header',
							'container' => false,
							'menu_id' => 'primary-menu1',
							'menu_class' => 'header__nav',
						),
					);
					?>
				</nav><!-- #site-navigation -->

				<button class="burger"
					aria-label="Open the menu"><span></span><span></span><span></span></button><!-- burger -->
			</div>
		</header><!-- #masthead -->