<?php

/**
 * Template part for displaying single-posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package novazyn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="entry-content">
			<?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
				<div class="back-link"><a href="<?php echo esc_url($_SERVER['HTTP_REFERER']); ?>">Wróć do wpisów</a></div>

			<?php }

			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif; ?>
			<a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>" class="art-cat"> <?php echo get_the_category()[0]->name; ?></a>
			<?php start_post_thumbnail(); ?>
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div><!-- .entry-content -->
		<aside>
			<div class="last-posts">
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4,
					'order' => 'DESC',
					'post_status' => 'publish',
				);

				$last_posts = new WP_Query($args);
				if ($last_posts->have_posts()) { ?>
					<h3>Najnowsze wpisy</h3>
					<ul>
						<?php while ($last_posts->have_posts()) {
							$last_posts->the_post();  ?>
							<li>
								<?php echo my_custom_attachment_image(get_post_thumbnail_id()); ?>
								<div class="content">
									<h5><?php echo wp_trim_words(get_the_title(), 5); ?></h5>
									<a href="<?php echo esc_url(get_permalink()); ?>" class="news__content_link">CZYTAJ więcej</a>
								</div>
							</li>
						<?php } ?>
					</ul>
				<?php
				}
				wp_reset_postdata(); ?>
			</div>
			<div class="tags">
				<?php
				$tags = get_the_tags();
				if ($tags && !is_wp_error($tags)) { ?>
					<h3>Tagi:</h3>
					<ul class="post-tags">
						<?php foreach ($tags as $tag) { ?>
							<li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name)  ?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
		</aside>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->