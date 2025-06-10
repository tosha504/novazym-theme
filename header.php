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
	<script>
		(function(w, d, s, o, f, js, fjs) {
			w['ecm-widget'] = o;
			w[o] = w[o] || function() {
				(w[o].q = w[o].q || []).push(arguments)
			};
			js = d.createElement(s), fjs = d.getElementsByTagName(s)[0];
			js.id = '3-b6fcc542fb021c84fdaff536dd0a74a1';
			js.dataset.a = 'novazym';
			js.src = f;
			js.async = 1;
			fjs.parentNode.insertBefore(js, fjs);
		}(window, document, 'script', 'ecmwidget', 'https://d70shl7vidtft.cloudfront.net/widget.js'));
	</script>
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
							'menu_id' => 'primary-menu',
							'menu_class' => 'header__nav',
						),
					);
					wp_nav_menu(
						array(
							'theme_location' => 'header-btn',
							'container' => false,
							'menu_id' => 'primary-menu1',
							'menu_class' => 'header__nav_buttons',
						),
					);
					?>
				</nav><!-- #site-navigation -->
				<div class="header__bag">
					<a href="<?php echo wc_get_cart_url(); ?>" class="cart-bag"><span class="count">
							<?php
							global $woocommerce;
							echo sprintf($woocommerce->cart->cart_contents_count);
							?>
						</span></a>
				</div>
				<button class="burger"
					aria-label="Open the menu"><span></span><span></span><span></span></button><!-- burger -->
			</div>

		</header><!-- #masthead -->