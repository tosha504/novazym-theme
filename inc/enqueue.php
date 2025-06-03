<?php

/**
 * Theme enqueue scripts and styles.
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
if (!function_exists('start_scripts')) {
	function start_scripts()
	{
		$theme_uri = get_template_directory_uri();
		// Custom JS
		if (!wp_script_is("wc-cart-fragments", "enqueued") && wp_script_is("wc-cart-fragments", "registered")) {
			// Enqueue the wc-cart-fragments script
			wp_enqueue_script("wc-cart-fragments");
		}

		wp_register_script('slick_theme_functions', $theme_uri . '/libery/slick.min.js', [], false, true);
		wp_enqueue_script('start_functions', $theme_uri . '/src/index.js', ['jquery', 'slick_theme_functions'], time(), true);
		if (is_checkout()) {
			wp_enqueue_script('checkout_script', get_template_directory_uri() . ('/src/add_quantity.js'), array(), false, true);
			$localize_script = array(
				'ajax_url' => admin_url('admin-ajax.php')
			);
			wp_localize_script('checkout_script', 'add_quantity', $localize_script);
		}
		wp_localize_script('start_functions', 'localizedObject', [
			'ajaxurl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('ajax_nonce'),
		]);

		// Custom css
		wp_enqueue_style(
			'my-google-fonts',
			'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap',
			false
		);
		wp_enqueue_style('start_style', $theme_uri . '/src/index.css', [], time());

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'start_scripts',);



function custom_block_theme_acf_enqueue_scripts()
{
	$theme_uri = get_template_directory_uri();
	//if slick
	wp_register_script('slick_theme_functions', $theme_uri . '/libery/slick.min.js', [], false, true);
	if (has_block('acf/example-name', get_queried_object_id())) {
		wp_enqueue_script('example-name', get_template_directory_uri() . "/blocks/example-name/example-name.js", array(), '1.0.0', true);
	}
	if (has_block('acf/tnl-carousel', get_queried_object_id())) {
		wp_enqueue_script('tnl-carousel', get_template_directory_uri() . "/blocks/tnl-carousel/tnl-carousel.js", array('slick_theme_functions'), '1.0.0', true);
	}
	if (has_block('acf/trusted-tnl', get_queried_object_id())) {
		wp_enqueue_script('trusted-tnl', get_template_directory_uri() . "/blocks/trusted-tnl/trusted-tnl.js", array('slick_theme_functions'), '1.0.0', true);
	}
}
add_action('wp_enqueue_scripts', 'custom_block_theme_acf_enqueue_scripts');
add_action('admin_enqueue_scripts', 'custom_block_theme_acf_enqueue_scripts');

add_action('wp_ajax_update_order_review', 'update_order_review');
add_action('wp_ajax_nopriv_update_order_review', 'update_order_review');
function update_order_review()
{
	WC()->cart->cart_contents[$_POST['key']]['quantity'] = $_POST['qty'];
	WC()->cart->calculate_totals();
	$cart_fragments = apply_filters('woocommerce_add_to_cart_fragments', false);
	echo json_encode($cart_fragments);
	// woocommerce_cart_totals();
	wp_die();
}
function implement_ajax_apply_coupon()
{
	global $woocommerce;
	$code = filter_input(INPUT_POST, 'coupon_code', FILTER_DEFAULT);

	if (empty($code) || !isset($code)) {
		$response = array(
			'result'    => 'error',
			'message'   => 'Code text field can not be empty.'
		);

		header('Content-Type: application/json');
		echo json_encode($response);
		exit();
	}

	$coupon = new WC_Coupon($code);

	if (!$coupon->id && !isset($coupon->id)) {
		$response = array(
			'result'    => 'error',
			'message'   => 'Invalid code entered. Please try again.'
		);

		header('Content-Type: application/json');
		echo json_encode($response);
		exit();
	} else {
		if (!empty($code) && !WC()->cart->has_discount($code)) {
			WC()->cart->add_discount($code);
			$response = array(
				'result'    => 'success',
				'message'   => 'successfully added coupon code'
			);

			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
	}
}

add_action('wp_ajax_ajaxapplucoupon', 'implement_ajax_apply_coupon');
add_action('wp_ajax_nopriv_ajaxapplucoupon', 'implement_ajax_apply_coupon');
