<?php

/**
 * Banner TNL Block template.
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
$title = !empty(get_field('title')) ? "<div class='tnl-banner__left_title'>" . get_field('title') . "</div> " : "";
$content = !empty(get_field('content')) ? "<div class='tnl-banner__left_content'>" . get_field('content') . "</div> " : "";
$button = !empty(get_field('button')) ? "<div class='tnl-banner__left_button'><a class='button-tnl' href='" . esc_url(get_field('button')["url"]) . "' targrt='" . get_field('button')["target"] . "'>" . get_field('button')["title"] . "</a></div> " : "";
$bg_iamge = !empty(get_field('bg_iamge')) ? "style='background-image: url(" . wp_get_attachment_url(get_field('bg_iamge')) . ");'" : "";
$icon_text = !empty(get_field('icon_text')) ? wp_get_attachment_image(get_field('icon_text')) : "";
$text = !empty(get_field('text')) ? "<p>" . get_field('text') . "</p> " : "";

?>
<!-- tnl-banner start -->
<section class="tnl-banner" <?php echo $anchor; ?>>
  <div class="container">
    <div class="tnl-banner__left">
      <?php echo $title . $content . $button; ?>
    </div>
    <div class="tnl-banner__right" <?php echo $bg_iamge; ?>>
      <div class='tnl-banner__right_text'>
        <?php echo $icon_text . $text; ?>
      </div>
    </div>
  </div>
</section><!-- tnl-banner end -->