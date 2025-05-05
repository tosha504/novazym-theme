<?php

/**
 * Single Product TNL Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// Load values and assign defaults.

$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
$title = !empty(get_field('title')) ? "<div class='tnl-single-product__top_title'>" . get_field('title') . "</div> " : "";
$image_product = get_field('image_product');
$title_product = get_field('title_product');
$subtitle = get_field('subtitle');
$test_description = get_field('test_description');
$test_product = get_field('test_product');

?>
<!-- tnl-single-product start -->
<section class="tnl-single-product" <?php echo $anchor; ?>>
  <div class="container">
    <div class="tnl-single-product__top">
      <?php echo $title; ?>
    </div>
    <div class="tnl-single-product__bottom">
      <div class="item">
        <?php
        if (!empty($image_product)) { ?>
          <div class="item__icon">
            <?php echo wp_get_attachment_image($image_product, 'full') ?>
          </div>
        <?php } ?>
        <div class="item__content">
          <?php if (!empty($title_product)) { ?>
            <div class="item__content_title">
              <?php echo $title_product; ?>
            </div>
          <?php }
          if (!empty($subtitle)) { ?>
            <div class="item__content_subtitle">
              <?php echo $subtitle; ?>
            </div>
          <?php }
          if (!empty($test_description)) { ?>
            <div class="item__content_description">
              <?php echo $test_description; ?>
            </div>
          <?php }
          if (!empty($test_product)) {
            echo  do_shortcode('[add_to_cart id="' . $test_product[0]->ID . '" style="border:none; padding: 0"]');
          } ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- tnl-single-product end -->