<?php

/**
 * TNL Content Items Render Callback
 *
 * @package  bht-tnl
 */
defined('ABSPATH') || exit;

function tnl_content_items_render_callback($anchor = null, $gradient, $title, $content, $elements = null)
{
?>
  <!-- tnl-content-items start -->
  <section class="tnl-content-items" <?php echo $anchor; ?>>
    <div class="container
     <?php if (!empty($gradient)) {
        echo 'gradient';
      } ?>" <?php echo $gradient; ?>>
      <div class="tnl-content-items__top">
        <?php echo $title . $content; ?>
      </div>
      <?php
      if (!empty($elements) && count($elements) > 0) {
        $col = count($elements) > 3 ? "col-4" : "col-3"; ?>
        <div class="tnl-content-items__bottom">
          <?php foreach ($elements as $key => $element) {
            if (!empty(array_filter($element))) { ?>
              <div class="tnl-content-items__bottom_item item <?php echo $col; ?>">
                <?php if (!empty($element["icon"])) { ?>
                  <div class="item__icon">
                    <?php echo wp_get_attachment_image($element["icon"], 'full') ?>
                  </div>
                <?php } ?>
                <?php if (!empty($element["title_element"])) { ?>
                  <p class="item__title">
                    <?php echo $element["title_element"]; ?>
                  </p>
                <?php } ?>
                <?php if (!empty($element["description_element"])) { ?>
                  <p class="item__description">
                    <?php echo $element["description_element"]; ?>
                  </p>
                <?php } ?>
              </div>
          <?php }
          } ?>
        </div>
      <?php } ?>
    </div>
  </section><!-- tnl-content-items end -->
<?php }
