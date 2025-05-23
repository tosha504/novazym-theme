<?php

/**
 * Content Items TNL Block template.
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
$title = !empty(get_field('title')) ? "<div class='tnl-content-items__top_title'>" . get_field('title') . "</div> " : "";
$content = !empty(get_field('description')) ? "<div class='tnl-content-items__top_content'>" . get_field('description') . "</div> " : "";
$elements = !empty(get_field('elements')) ? get_field('elements') : "";
$gradient = !empty(get_field('gradient')) ? "style='background : " . get_field('gradient') . ";'" : "";
tnl_content_items_render_callback($anchor, $gradient, $title, $content, $elements);
