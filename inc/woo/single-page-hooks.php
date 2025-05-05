<?php
defined('ABSPATH') || exit;
// woocommerce_before_single_product

add_action('woocommerce_before_main_content', function () {
  echo '<div class="wrap-breadcrumb"><div class="container">';
}, 19);
add_action('woocommerce_before_main_content', function () {
  echo '</div></div>';
}, 21);

// woocommerce_single_product_summary
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);

// woocommerce_after_single_product_summary
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
