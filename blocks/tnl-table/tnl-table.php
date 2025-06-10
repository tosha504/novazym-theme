<?php

/**
 * Table TNL Block template.
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
$title = !empty(get_field('title')) ? "<div class='tnl-table__title'>" . get_field('title') . "</div> " : "";
$content = !empty(get_field('description')) ? "<div class='tnl-table__content'>" . get_field('description') . "</div> " : "";
$rows = get_field('tabel');
$table_titles = get_sub_field('table_titles');

tnl_table_render_callback($title, $content, $table_titles, $rows);
