<?php

/**
 * Builder Feedback TNL
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('title')) ? get_sub_field('title') : "";
$feedback = get_sub_field('feedback'); ?>
<section class="feedback">
  <div class="container">
    <?php echo $title;
    if (!empty($feedback) && count($feedback) > 0) {
    ?>
      <div class="feedback__items">
        <?php foreach ($feedback as $key => $item) {
          $text_feedback = !empty($item['text_feedback']) ? $item['text_feedback'] : "";
          $person = !empty($item['person']) ? $item['person'] : ""; ?>
          <div class="feedback__item">
            <div class="feedback__item_position"><?php echo $text_feedback; ?></div>
            <div class="feedback__item_text"><?php echo $person; ?></div>
          </div>
        <?php } ?>
      <?php } ?>
      </div>
  </div>
</section>