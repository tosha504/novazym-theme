<?php

/**
 * Builder TNL Column Image
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('title')) ? "<div class='tnl-column-image__left_title'>" . get_sub_field('title') . "</div> " : "";
$content = !empty(get_sub_field('content')) ? "<div class='tnl-column-image__left_content'>" . get_sub_field('content') . "</div> " : "";

$image = !empty(get_sub_field('image')) ? wp_get_attachment_image(get_sub_field('image'), 'full') : "";
$image_left = get_sub_field('image_left') !== false ? "style='flex-direction: row-reverse;'" : "";
$bg_color =  get_sub_field('bg_color') === true ? " gradient" : "";
tnl_column_image_block_render_callback($bg_color, $image_left, $title, $content, $image);
