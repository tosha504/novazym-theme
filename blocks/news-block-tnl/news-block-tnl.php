<?php

/**
 * News Block TNL Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 */

// Load values and assign defaults.

$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
$title = !empty(get_field('title')) ? "<h2 class='news-block-tnl__title'>" . get_field('title') . "</h2>" : "";
$news = get_field('news');
$link = get_field('link');  ?>
<!-- news-block-tnl start -->
<section class="news-block-tnl" <?php echo $anchor; ?>>
  <div class="container">
    <?php echo $title;
    if (!empty($news) && count($news) > 0) { ?>
      <div class="news-block-tnl__newses">
        <?php foreach ($news as $key => $new) { ?>
          <div class="news-block-tnl__newses_news news">
            <div class="news__image">
              <?php echo my_custom_attachment_image(get_post_thumbnail_id($new->ID)); ?>
            </div>
            <div class="news__content">
              <h4><?php echo wp_trim_words($new->post_title, 8); ?></h4>
              <p><?php echo wp_trim_words($new->post_content, 16); ?></p>
              <a href="<?php echo get_permalink($new->ID); ?>" class="news__content_link">CZYTAJ więcej</a>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>

    <?php
    if ($link) {
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
      <div class="news-block-tnl__button">
        <a class="button button__secondary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
      </div>
    <?php } ?>
  </div>
</section><!-- news-block-tnl end -->