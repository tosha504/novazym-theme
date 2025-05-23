<?php

/**
 * Form TNL Block template.
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
$title = !empty(get_field('Content_before_form')) ? "<div class='tnl-form__top_title'>" . get_field('Content_before_form') . "</div> " : "";
$shortcode = !empty(get_field('shortcode')) ? get_field('shortcode') : "";
tnl_form_render_callback($anchor, $title, $shortcode);
