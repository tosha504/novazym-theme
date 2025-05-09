<?php

/**
 * TNL Column Image Block Render Callback
 *
 * @package  bht-tnl
 */
defined('ABSPATH') || exit;

function tnl_column_image_block_render_callback($bg_color, $image_left, $title, $content, $image)
{ ?>
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
<?php }
