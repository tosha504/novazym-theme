<?php

/**
 * Variants tests TNL Block template.
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
$title = !empty(get_field('title')) ? "<div class='tnl-variants-test__top_title'>" . get_field('title') . "</div> " : "";
$tests = !empty(get_field('tests')) ? get_field('tests') : ""; ?>
<!-- tnl-variants-test start -->
<section class="tnl-variants-test" <?php echo $anchor; ?>>
  <div class="container">
    <div class="tnl-variants-test__top">
      <?php echo $title; ?>
    </div>
    <?php if (!empty($tests) && count($tests) > 0) { ?>
      <div class="tnl-variants-test__bottom">
        <?php foreach ($tests as $key => $element) {
        ?>
          <div class="tnl-variants-test__bottom_item item ">
            <?php if (!empty($element["title_test"])) { ?>
              <div class="item__title">
                <?php echo $element["title_test"]; ?>
              </div>
            <?php }
            if (!empty($element["image_test"])) { ?>
              <div class="item__icon">
                <?php echo wp_get_attachment_image($element["image_test"], 'full') ?>
              </div>
            <?php }
            if (!empty($element["test_product"])) {
              echo  do_shortcode('[add_to_cart id="' . $element["test_product"][0]->ID . '" style="border:none; padding: 0"]');
            } ?>
            <?php if (!empty($element["test_description"])) { ?>
              <div class="item__description">
                <?php echo $element["test_description"]; ?>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section><!-- tnl-variants-test end -->