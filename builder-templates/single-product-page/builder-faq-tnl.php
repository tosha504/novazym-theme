<?php

/**
 * Builder FAQ TNL
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('title')) ? get_sub_field('title') : "";
$tabs = get_sub_field('questions'); ?>
<section class="tabs-wrap">
  <div class="container">
    <?php echo $title;
    if (!empty($tabs) && count($tabs) !== 0) { ?>
      <ul class="tabs__items">
        <?php foreach ($tabs as $key => $tab) { ?>
          <li>
            <div class="question">
              <p>
                <?php echo $tab['question']; ?>
              </p>
              <button aria-label="Toggle Accordion Content">
                <div></div>
              </button>
            </div>
            <div class="answer">
              <?php echo $tab['answer']; ?>
            </div>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </div>
</section>