<?php

/**
 * Tiles TNL Block template.
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
$title = !empty(get_field('title')) ? "<div class='tiles-tnl__title'>" . get_field('title') . "</div> " : "";
$tiles = get_field('tiles'); ?>
<!-- tiles-tnl start -->
<section class="tiles-tnl" <?php echo $anchor; ?>>
  <div class="container">
    <?php echo $title;
    if (!empty($tiles) && count($tiles) > 0) { ?>
      <div class="tiles-tnl__tiles">
        <?php foreach ($tiles as $key => $tile) {
          // var_dump($tiles);
        ?>
          <div class="tiles-tnl__tiles_tile tile">
            <?php if (!empty($tile['image'])) { ?>
              <div class="tile__image">
                <?php my_custom_attachment_image($tile['image']); ?>
              </div>
            <?php } ?>
            <div class="tile__content">
              <?php if (!empty($tile['title'])) {
                echo  "<p class='tile__content_title'>" . $tile['title'] . "</p>";
              } ?>
              <?php if (!empty($tile['for_whom'])) {
                echo "<p>" . $tile['for_whom'] . "</p>";
              } ?>
              <?php if (!empty($tile['link'])) {
                echo "<a href='" . $tile['link']['url'] . "' class='button-tnl' target=" . $tile['link']['target'] . ">" . $tile['link']['title'] . "</a>";
              } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section><!-- tiles-tnl end -->