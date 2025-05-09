<?php

/**
 * For Whom TNL
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$bg_block = !empty(get_sub_field('bg_block')) ? "style='background:" . get_sub_field('bg_block') . ";'" : "";
$content = !empty(get_sub_field('content')) ? "<div class='for_whom_tnl__left_content'>" . get_sub_field('content') . "</div> " : "";
$bg_block_right = !empty(get_sub_field('bg_block_right')) ? "style='background:" . get_sub_field('bg_block') . ";'" : "style='background: linear-gradient(150deg, rgba(21, 70, 122, 1) 0%, rgba(21, 70, 122, 1) 50%, rgba(0, 212, 255, 1) 100%);'";
$content_right = !empty(get_sub_field('content_right')) ? "<div class='for_whom_tnl__left_content'>" . get_sub_field('content_right') . "</div> " : ""; ?>

<!-- for_whom_tnl start -->
<section class="for_whom_tnl">
  <div class="container">
    <div class="for_whom_tnl__left" <?php echo  $bg_block; ?>>
      <?php echo $content; ?>
    </div>
    <div class="for_whom_tnl__right" <?php echo  $bg_block_right; ?>>
      <?php echo $content_right; ?>
    </div>
  </div>
</section><!-- for_whom_tnl end -->