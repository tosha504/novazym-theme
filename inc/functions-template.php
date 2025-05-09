<?php

/**
 * Custom functions
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$dir = get_template_directory() . '/inc/assets-blocks-functions';
$blocks_functions = scandir($dir);
$fiels = array_diff($blocks_functions, array('.', '..'));
if (!empty($fiels)) {
  foreach ($fiels as $key => $block) {
    include  $dir . '/' . $block;
  }
}

function my_custom_attachment_image($attachment_id)
{
  echo wp_get_attachment_image($attachment_id, 'full', false, ['alt' => get_post_meta($attachment_id, '_wp_attachment_image_alt', true), 'loading' => 'lazy', 'title' => get_the_title($attachment_id)]);
}

function single_product_acf_templates_left()
{
  if (have_rows('product_field_tnl', get_the_ID())) {
    while (have_rows('product_field_tnl',  get_the_ID())) {
      the_row();
      if (get_row_layout() == 'builder_tnl_column_image') {
        get_template_part('builder-templates/single-product-page/builder-tnl-column-image');
      } elseif (get_row_layout() == 'for_whom_tnl') {
        get_template_part('builder-templates/single-product-page/for-whom-tnl');
      } elseif (get_row_layout() == 'gens_tnl') {
        get_template_part('builder-templates/single-product-page/gens-tnl');
      } elseif (get_row_layout() == 'builder_content_items_tnl') {
        get_template_part('builder-templates/single-product-page/builder-content-items-tnl');
      } elseif (get_row_layout() == 'builder_feedback_tnl') {
        get_template_part('builder-templates/single-product-page/builder-feedback-tnl');
      } elseif (get_row_layout() == 'faq') {
        get_template_part('builder-templates/single-product-page/builder-faq-tnl');
      }
    }
  }
}
