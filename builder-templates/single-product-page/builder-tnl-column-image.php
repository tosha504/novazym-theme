<?php

/**
 * Builder TNL Column Image
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('title')) ? "<div class='tnl-column-image__left_title'>" . get_sub_field('title') . "</div> " : "";
$content = !empty(get_sub_field('content')) ? "<div class='tnl-column-image__left_content'>" . get_sub_field('content') . "</div> " : "";

$image = !empty(get_sub_field('image')) ? wp_get_attachment_image(get_sub_field('image'), 'full') : "";
$image_left = get_sub_field('image_left') !== false ? "style='flex-direction: row-reverse;'" : "";
$bg_color =  get_sub_field('bg_color') === true ? " gradient" : ""; ?>
<!-- tnl-column-image start -->
<section class="tnl-column-image">
  <div class="container <?php echo $bg_color; ?>" <?php echo  $image_left; ?>>
    <div class="tnl-column-image__left">
      <?php echo $title . $content; ?>
    </div>
    <div class="tnl-column-image__right">
      <?php echo $image; ?>
    </div>
  </div>
</section><!-- tnl-column-image end -->