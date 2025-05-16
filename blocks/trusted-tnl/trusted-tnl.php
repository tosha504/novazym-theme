<?php

/**
 * Trusted TNL Block template.
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
$title = !empty(get_field('title')) ? "<div class='trusted-tnl__title'>" . get_field('title') . "</div> " : "";
$brands = get_field('brands'); ?>
<!-- trusted-tnl start -->
<section class="trusted-tnl" <?php echo $anchor; ?>>
  <div class="container">
    <?php echo $title;
    if (!empty($brands) && count($brands) > 0) { ?>
      <div class="trusted-tnl__brands">
        <?php foreach ($brands as $key => $brand) { ?>
          <div class="trusted-tnl__brands_bramnd">
            <?php my_custom_attachment_image($brand['brand_logo']); ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section><!-- trusted-tnl end -->