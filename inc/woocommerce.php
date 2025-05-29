<?php
defined('ABSPATH') || exit;
include 'woo/single-page-hooks.php';

add_action('after_setup_theme', 'bht_tnl_add_woocommerce_support', 99);
if (!function_exists('bht_tnl_add_woocommerce_support')) {
  /**
   * Declares WooCommerce theme support.
   */

  function bht_tnl_add_woocommerce_support()
  {
    add_theme_support('woocommerce');
    // add_theme_support('woocommerce');
    // array(
    //   'thumbnail_image_width' => 250,
    //   'single_image_width'    => 170,
    // );
    // Add Product Gallery support.

    // add_theme_support('wc-product-gallery-lightbox');
    // remove_theme_support('wc-product-gallery-zoom');
    // add_theme_support('wc-product-gallery-slider');
  }
}
remove_theme_support('wc-product-gallery-zoom');
remove_theme_support('wc-product-gallery-lightbox');
remove_theme_support('wc-product-gallery-slider');
//Remove actions bht
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter('woocommerce_enqueue_styles', '__return_false');

// add_action('custom_payment_position', 'woocommerce_checkout_payment', 20);

add_action('woocommerce_before_quantity_input_field', function () {

  echo '<button class="cart-qty minus">-</button>';
});

add_action('woocommerce_after_quantity_input_field', function () {

  echo '<button class="cart-qty plus">+</button>';
});
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
  global $woocommerce;

  ob_start(); ?>
  <a href="<?php echo wc_get_cart_url(); ?>" class="cart-bag">
    <span class="count">
      <?php echo sprintf($woocommerce->cart->cart_contents_count); ?>
    </span></a>
<?php
  $fragments['div.header__bag a'] = ob_get_clean();

  return $fragments;
}
add_action('woocommerce_before_checkout_form', function () {
  echo '<div class="container">sdfsdf';
}, 1);

add_action('woocommerce_after_checkout_form', function () {
  echo '</div>';
}, 1);
remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
add_action('custom_payment_position', 'woocommerce_checkout_payment', 20);
//archive-page
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_shop_loop_header', function () {
?>
  <div class="shop-banner-tnl">
    <div class="container">
      <?php echo '<h1>Sklep Novazyn</h1>'; ?>
    </div>
  </div>
<?php
}, 11);


add_action('woocommerce_before_shop_loop',  function () {
?>
  <div class="products-wrap-tnl">
  <?php
}, 19);


add_action('woocommerce_before_shop_loop', function () { ?>
  </div>
<?php
}, 31);
add_action('woocommerce_after_shop_loop_item_title', 'ventini_show_excerpt_on_shop_page', 6);
function ventini_show_excerpt_on_shop_page()
{
  global $product;

  // Only run on shop or archive pages
  if (is_shop() || is_product_category() || is_product_tag()) {
    echo '<p class="product__wrap-body_excerpt">' . wp_trim_words(get_the_excerpt(), 8) . '</p>';
  }
}
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
add_action('woocommerce_before_cart', function () {
  echo '<div class="container">';
}, 5);
add_action('woocommerce_before_cart', function () {
  echo '</div>';
}, 15);
