<?php

/**
 * Opent Text TNL Block template.
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
$title = !empty(get_field('title')) ? "<h2 >" . get_field('title') . "</h2> " : "";
function trimText($text, $wordLimit = 20)
{
  $words = explode(" ", $text);
  if (count($words) > $wordLimit) {
    $trimmedText = implode(" ", array_slice($words, 0, $wordLimit)) . '...';
    return [$trimmedText, $text, true]; // Skrócony tekst, pełny tekst, czy ma być przycisk
  }
  return [$text, $text, false]; // Pełny tekst, bez potrzeby przycisku
}

$fullText = get_field('text');
list($trimmedText, $originalText, $hasMore) = trimText($fullText);
$gradient = !empty(get_field('gradient')) ? '<p class="gradient" style="background:' . get_field('gradient') . ';"></p>' : ""; ?>
<!-- tnl-opent-text start -->
<section class="tnl-opent-text" <?php echo $anchor; ?>>
  <div class="container">
    <?php echo $gradient; ?>
    <div class="wrap">
      <?php echo $title; ?>
      <p id="text">
        <?php if ($hasMore): ?>
          <span id="short-text"><?php echo $trimmedText; ?></span>
          <span id="full-text" class="hidden-text"><?php echo $originalText; ?></span>
        <?php else: ?>
          <span><?php echo $originalText; ?></span>
        <?php endif; ?>
      </p>

      <?php if ($hasMore): ?>
        <button id="toggle-btn" onclick="toggleText()">Zobacz więcej</button>
      <?php endif; ?>

    </div>
    <script>
      function toggleText() {
        let $shortText = jQuery("#short-text");
        let $fullText = jQuery("#full-text");
        let $button = jQuery("#toggle-btn");

        if ($fullText.is(":hidden")) {
          $shortText.hide();
          $fullText.show();
          $button.text("Zobacz mniej");
        } else {
          $shortText.show();
          $fullText.hide();
          $button.text("Zobacz więcej");
        }
      }
    </script>
  </div>
</section><!-- tnl-opent-text end -->