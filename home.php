<?php

/**
 * The template for displaying home(archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bht-tnl
 */
get_header(); ?>
<main id="primary" class="site-main">
  <?php echo  get_most_popular_posts(3);
  $categories = get_categories(); ?>
  <div class="categories-wrap">
    <div class="container">
      <h2 class="categories-title">Kategorie</h2>
      <ul class="posts-categories">
        <li>
          <a class="button button__secondary" href="<?php echo esc_url(home_url('/blog')); ?>">
            Wszystkie</a>
        </li>
        <?php foreach ($categories as $category) { ?>
          <li><a class="button button__secondary" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
              <?php echo  $category->name ?></a>
          </li>
        <?php }
        ?>
      </ul>
    </div>
  </div>
  <?php if (have_posts()) { ?>
    <div class="container">
      <div class="news-block-tnl__newses">
        <?php while (have_posts()) {
          the_post(); ?>
          <div class="news-block-tnl__newses_news news">
            <div class="news__image">
              <?php echo my_custom_attachment_image(get_post_thumbnail_id()); ?>
            </div>
            <div class="news__content">
              <h4><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
              <p><?php echo wp_trim_words(get_the_content(), 16); ?></p>
              <a href="<?php echo get_permalink(get_the_ID()); ?>" class="news__content_link">CZYTAJ więcej</a>
            </div>
          </div>
      <?php  }
        echo '</div>';
      }
      wp_reset_postdata();
      tnl_custom_pagination(); ?>
      </div>
</main><!-- #main -->

<?php
get_footer();
