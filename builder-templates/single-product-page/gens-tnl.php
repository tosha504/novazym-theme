<?php

/**
 * Gens TNL
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('title')) ? "<div class='tnl-content-items__top_title'>" . get_sub_field('title') . "</div> " : "";
$content = !empty(get_sub_field('description')) ? "<div class='tnl-content-items__top_content'>" . get_sub_field('description') . "</div> " : "";
$text_after_image = !empty(get_sub_field('text_after_image')) ? get_sub_field('text_after_image') : "";
$image = !empty(get_sub_field('image')) ? get_sub_field('image') : "";
$gens_left = !empty(get_sub_field('gens_left')) ? get_sub_field('gens_left') : "";
?>

<!-- gens-tnl start -->
<section class="gens-tnl">
  <div class="container">
    <div class="tnl-content-items__top">
      <?php echo $title . $content; ?>
    </div>
    <div class="gens-tnl__gens">
      <div class="gens-tnl__gens_left">
        <?php echo my_custom_attachment_image($image) . $text_after_image; ?>
      </div>
      <div class="gens-tnl__gens_right">
        <?php echo $gens_left; ?>
      </div>
    </div>
  </div>
</section><!-- gens-tnl end -->