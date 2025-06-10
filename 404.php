<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package novazyn
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="error">
		<div class="container">
			<div class="error_content">
				<div class="error_number">
					404
				</div>
				<h1 class="error_content-title"><?php esc_html_e('Niestety nie udało się odnaleźć tej strony', 'teatr'); ?></h1>
				<div class="e404">
					<a class="button button__secondary" href="<?php echo esc_url(home_url('/')) ?>">
						Wróć do strony głównej
					</a>
				</div>
			</div><!-- .page-content -->
		</div>
	</section><!-- .error-404 -->
</main><!-- #main -->

<?php
get_footer();
