<?php

/**
 * Custom functions
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

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
      } elseif (get_row_layout() == 'image') {
        get_template_part('builder-templates/single-product-page/image');
      }
    }
  }
}
