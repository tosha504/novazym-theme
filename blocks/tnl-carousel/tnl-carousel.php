<?php

/**
 * Carousel TNL Block template.
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
$slides =  get_field('slides'); ?>
<!-- tnl-carousel start -->
<section class="tnl-carousel" <?php echo $anchor; ?>>
  <div class="container">
    <?php if (!empty($slides)) { ?>
      <div class="tnl-carousel__slider_slide">
        <?php foreach ($slides as $slide) {
          $bg_iamge = !empty($slide['bg_iamge']) ? "style='background-image: url(" . wp_get_attachment_url($slide['bg_iamge']) . ");'" : "";
          $title = !empty($slide['title']) ? "<div class='slide__left_title'>" . $slide['title'] . "</div> " : "";
          $content = !empty($slide['content']) ? "<div class='slide__left_content'>" . $slide['content'] . "</div> " : "";
          $button = !empty($slide['button']) ? "<div class='slide__left_button'><a class='button-tnl' href='" . esc_url($slide['button']["url"]) . "' targrt='" . $slide['button']["target"] . "'>" . $slide['button']["title"] . "</a></div> " : "";
        ?>
          <div class="slide__wrap">
            <div class="slide__left">
              <?php echo $title . $content . $button; ?>
            </div>
            <div class="slide__right" <?php echo $bg_iamge; ?>>
            </div>
          </div>
        <?php
        } ?>
      </div>
    <?php } ?>
  </div>
</section><!-- tnl-carousel end -->