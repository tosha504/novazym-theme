<?php

/**
 * Belt Text TNL Block template.
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
$text = !empty(get_field('text')) ? "<h4 class='tnl-belt__title'>" . get_field('text') . "</h4> " : "";
$icon = !empty(get_field('icon')) ? get_field('icon') : "";
$link = get_field('link'); ?>
<!-- tnl-belt-text start -->
<section class="tnl-belt-text" <?php echo $anchor; ?>>
  <div class="container">
    <div class="tnl-belt-text__wrap">
      <?php if (!empty($icon)) {
        echo my_custom_attachment_image($icon);
      }
      echo $text;
      if (!empty($link)) {
        echo "<a class='button button__secondary' href='" . esc_url($link['url']) . "' target='" . esc_attr($link['target']) . "'>" . esc_html($link['title']) . "</a>";
      } ?></div>
  </div>
</section><!-- tnl-belt-text end -->