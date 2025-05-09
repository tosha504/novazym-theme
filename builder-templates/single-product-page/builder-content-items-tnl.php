<?php

/**
 * Builder Content Items TNL
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('title')) ? "<div class='tnl-content-items__top_title'>" . get_sub_field('title') . "</div> " : "";
$content = !empty(get_sub_field('description')) ? "<div class='tnl-content-items__top_content'>" . get_sub_field('description') . "</div> " : "";
$elements = !empty(get_sub_field('elements')) ? get_sub_field('elements') : "";
$gradient = !empty(get_sub_field('gradient')) ? "style='background : " . get_sub_field('gradient') . ";'" : "";
tnl_content_items_render_callback(null, $gradient, $title, $content, $elements);
