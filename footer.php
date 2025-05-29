<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package novazyn
 */
//col1
$footer_logo = get_field('footer_logo', 'options');
$content = get_field('content', 'options');
//col2
$title = get_field('title', 'options');
$links = get_field('links', 'options');
//col3
$title_three = get_field('title_three', 'options');
$links_three = get_field('links_three', 'options');
//col4
$title_four = get_field('title_four', 'options');
$socials = get_field('socials', 'options'); ?>

<footer id="colophon" class="footer">
  <div class="footer__top">
    <div class="container">
      <div class="footer__col">
        <div class="footer__col_top">
          <?php if (!empty($footer_logo)) {
            echo my_custom_attachment_image($footer_logo);
          } ?>
        </div>
        <div class="footer__col_bottom">
          <?php if (!empty($content)) {
            echo $content;
          } ?>
        </div>
      </div>

      <div class="footer__col">
        <div class="footer__col_top">
          <?php if (!empty($title)) {
            echo "<p class='title'>" . $title . "</p>";
          } ?>
        </div>
        <div class="footer__col_bottom">
          <?php if (!empty($links)) { ?>
            <ul>
              <?php foreach ($links as $key => $link) {
                if (!empty($link['link'])) {
                  $link_url = $link['link']['url'];
                  $link_title = $link['link']['title'];
                  $link_target = $link['link']['target'] ? $link['link']['target'] : '_self'; ?>
                  <li>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                  </li>
              <?php }
              }  ?>
            </ul>
          <?php } ?>
        </div>
      </div>

      <div class="footer__col">
        <div class="footer__col_top">
          <?php if (!empty($title_three)) {
            echo "<p class='title'>" . $title_three  . "</p>";
          } ?>
        </div>
        <div class="footer__col_bottom">
          <?php if (!empty($links_three)) { ?>
            <ul>
              <?php foreach ($links_three as $key => $link) {
                if (!empty($link['link'])) {
                  $link_url = $link['link']['url'];
                  $link_title = $link['link']['title'];
                  $link_target = $link['link']['target'] ? $link['link']['target'] : '_self'; ?>
                  <li>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                  </li>
              <?php }
              }  ?>
            </ul>
          <?php } ?>
        </div>
      </div>

      <div class="footer__col">
        <div class="footer__col_top">
          <?php if (!empty($title_four)) {
            echo "<p class='title'>" . $title_four  . "</p>";
          } ?>
        </div>
        <div class="footer__col_bottom">
          <?php if (!empty($socials)) { ?>
            <div class="socials">
              <?php foreach ($socials as $key => $social) {
                if (!empty($social['link'])) {
                  $link_url = $social['link']['url'];
                  $link_title = $social['link']['title'];
                  $link_target = $social['link']['target'] ? $social['link']['target'] : '_self'; ?>
                  <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <?php echo my_custom_attachment_image($social['icon']); ?>
                  </a>
              <?php }
              }  ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="container"> Novazyn © Wykonanie:<a href="https://thenewlook.pl/" title="Strony internetowe WordPress Sklepy internetowe WooCommerce" target="_blank"> THE NEW LOOK</a></div>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>