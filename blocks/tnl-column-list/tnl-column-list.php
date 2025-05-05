<?php

/**
 * List Column TNL Block template.
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

$lists = get_field('lists'); ?>
<!-- tnl-column-list start -->
<section class="tnl-column-list" <?php echo $anchor; ?>>
  <div class="container">
    <?php if (!empty($lists) && count($lists) > 0) { ?>
      <div class="tnl-column-list__lists">
        <?php foreach ($lists as $key => $list) { ?>
          <div class="tnl-column-list__lists_item">
            <?php if (!empty($list['title'])) {
              echo  "<p class='tnl-column-list__lists_item-title'>{$list['title']}</p>";
            }
            if (!empty($list['list'])) {
              echo  "<div class='tnl-column-list__lists_item-list'>{$list['list']}</div>";
            } ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section><!-- tnl-column-list end -->