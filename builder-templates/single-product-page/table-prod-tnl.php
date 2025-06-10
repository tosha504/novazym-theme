<?php

/**
 * Table Prod TNL
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('title')) ? "<div class='tnl-table__title'>" . get_sub_field('title') . "</div> " : "";
$content = !empty(get_sub_field('description')) ? "<div class='tnl-table__content'>" . get_sub_field('description') . "</div> " : "";
$rows = get_sub_field('tabel');
$table_titles = get_sub_field('table_titles');

tnl_table_render_callback($title, $content, $table_titles, $rows);
