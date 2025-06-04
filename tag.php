<?php

/**
 * Template for displaying tag archive pages
 * @package novazyn
 */
get_header();
?>

<main id="primary" class="site-main">

  <header class="category-header">
    <div class="container">
      <h1 class="category-title">
        <?php single_cat_title(); ?>
      </h1>
    </div>
  </header>

  <?php if (have_posts()) : ?>
    <div class="container">
      <div class="news-block-tnl__newses">
        <?php while (have_posts()) : the_post(); ?>
          <div class="news-block-tnl__newses_news news">
            <div class="news__image">
              <?php echo my_custom_attachment_image(get_post_thumbnail_id()); ?>
            </div>
            <div class="news__content">
              <h4><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
              <p><?php echo wp_trim_words(get_the_content(), 16); ?></p>
              <a href="<?php the_permalink(); ?>" class="news__content_link">CZYTAJ więcej</a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <?php tnl_custom_pagination(); ?>
    </div>
  <?php else : ?>
    <p>Brak wpisów w tej kategorii.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>