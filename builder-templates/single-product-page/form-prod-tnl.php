<?php

/**
 * Form Prod TNL
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$title = !empty(get_sub_field('Content_before_form')) ? "<div class='tnl-form__top_title'>" . get_sub_field('Content_before_form') . "</div> " : "";
$shortcode = !empty(get_sub_field('shortcode')) ? get_sub_field('shortcode') : "";
tnl_form_render_callback(null, $title, $shortcode);
