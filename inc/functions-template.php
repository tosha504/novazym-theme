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
      } elseif (get_row_layout() == 'table_prod') {
        get_template_part('builder-templates/single-product-page/table-prod-tnl');
      } elseif (get_row_layout() == 'form_prod') {
        get_template_part('builder-templates/single-product-page/form-prod-tnl');
      }
    }
  }
}
function tnl_custom_pagination()
{
  the_posts_pagination(array(
    'show_all'     => false,
    'end_size'     => 1,
    'mid_size'     => 1,
    'prev_next'    => true,
    'prev_text'    => __('<'),
    'next_text'    => __('>'),
    'add_args'     => false,
    'add_fragment' => '',
    'screen_reader_text' => __('Posts navigation'),
    'class'        => 'pagination',
  ));
}

// Function to track post views
function set_post_views($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

// To prevent post views from being counted every time a post is retrieved
function count_post_views($post_id)
{
  if (!is_single()) return;
  if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
  set_post_views($post_id);
}
add_action('wp_head', 'count_post_views');

// Prevent the post views from being cached
function track_post_views($query)
{
  if (!is_single()) return;

  global $post;
  $postID = $post->ID;
  set_post_views($postID);
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function get_most_popular_posts($num_posts = 3)
{
  $args = array(
    'posts_per_page' => $num_posts,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
  );

  $popular_posts_query = new WP_Query($args);
  ob_start();
  if ($popular_posts_query->have_posts()) { ?>
    <div class="popular-wrap">
      <div class="container">
        <h1 class="small">Baza wiedzy</h1>
        <ul class="popular-posts news-block-tnl__newses">
          <?php while ($popular_posts_query->have_posts()) {
            $popular_posts_query->the_post();  ?>
            <li class="news">
              <div class="news__image">
                <?php echo my_custom_attachment_image(get_post_thumbnail_id()); ?>
              </div>
              <div class="news__content">
                <h4><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
                <p><?php echo wp_trim_words(get_the_content(), 16); ?></p>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="news__content_link">CZYTAJ więcej</a>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
<?php
  }
  wp_reset_postdata();
  return ob_get_clean();
}
