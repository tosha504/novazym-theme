<?php

/**
 * Figures TNL Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 */

// Load values and assign defaults.

$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
$fields = get_field('fields'); ?>
<!-- figures-tnl start -->
<section class="figures-tnl" <?php echo $anchor; ?>>
  <div class="container">
    <?php if (!empty($fields) && count($fields) > 0) { ?>
      <div class="figures-tnl__fields">
        <?php foreach ($fields as $key => $field) {
          $numbers = !empty($field['numbers']) ? "<p class='numbers'>" . $field['numbers'] . "</p>" : "";
          $descr = !empty($field['descr']) ? "<p class='descr'>" . $field['descr'] . "</p>" : ""; ?>
          <div class="figures-tnl__fields_field">
            <?php echo $numbers . $descr; ?>
          </div>
      <?php }
      } ?>
      </div>
  </div>
</section><!-- figures-tnl end -->