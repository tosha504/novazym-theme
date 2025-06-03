<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novazyn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
			<a href="<?php echo esc_url($_SERVER['HTTP_REFERER']); ?>" class="back-link">Wróć do wpisów</a>
		<?php }

		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>
			<div class="entry-meta">
				<?php
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php start_post_thumbnail(); ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->