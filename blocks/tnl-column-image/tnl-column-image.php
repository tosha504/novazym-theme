<?php

/**
 * Column Image TNL Block template.
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
$title = !empty(get_field('title')) ? "<div class='tnl-column-image__left_title'>" . get_field('title') . "</div> " : "";
$content = !empty(get_field('content')) ? "<div class='tnl-column-image__left_content'>" . get_field('content') . "</div> " : "";

$image = !empty(get_field('image')) ? wp_get_attachment_image(get_field('image'), 'full') : "";
$image_left = get_field('image_left') !== false ? "style='flex-direction: row-reverse;'" : "";
$bg_color =  get_field('bg_color') === true ? " gradient" : ""; ?>
<!-- tnl-column-image start -->
<section class="tnl-column-image" <?php echo $anchor; ?>>
  <div class="container <?php echo $bg_color; ?>" <?php echo  $image_left; ?>>
    <div class="tnl-column-image__left">
      <?php echo $title . $content; ?>
    </div>
    <div class="tnl-column-image__right">
      <?php echo $image; ?>
    </div>
  </div>
</section><!-- tnl-column-image end -->