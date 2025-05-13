<?php

/**
 * TNL Table Render Callback
 *
 * @package  bht-tnl
 */
defined('ABSPATH') || exit;
function tnl_form_render_callback($anchor, $title = null, $shortcode = null,)
{ ?>
  <!-- tnl-form start -->
  <section class="tnl-form" <?php echo $anchor; ?>>
    <div class="container">
      <div class="tnl-form__top">
        <?php echo $title; ?>
      </div>
      <?php if ($shortcode !== null) {
        echo do_shortcode($shortcode);
      } ?>
    </div>
  </section><!-- tnl-form end -->
<?php
}
