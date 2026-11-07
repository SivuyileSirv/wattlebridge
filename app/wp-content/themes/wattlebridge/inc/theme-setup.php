<?php
/**
 * Theme setup and WordPress feature registration.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

/**
 * Register theme support and navigation menus.
 *
 * @return void
 */
function wattlebridge_setup(): void
{
  // WordPress document title.
  add_theme_support('title-tag');

  // Featured images.
  add_theme_support('post-thumbnails');

  // Semantic HTML5 markup.
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // Theme navigation locations.
  register_nav_menus(
    array(
      'primary' => __('Primary Navigation', 'wattlebridge'),
      'footer' => __('Footer Navigation', 'wattlebridge'),
    )
  );
}
add_action('after_setup_theme', 'wattlebridge_setup');

/**
 * Output the theme-controlled SVG favicon.
 *
 * @return void
 */
function wattlebridge_output_favicon(): void
{
  $favicon_url = get_theme_file_uri(
    'assets/images/branding/wattlebridge-symbol.svg'
  );

  ?>
  <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/svg+xml" sizes="any">
  <?php
}

add_action('wp_head', 'wattlebridge_output_favicon', 1);
add_action('admin_head', 'wattlebridge_output_favicon', 1);

/**
 * Remove the Site Icon control from the Customizer.
 *
 * Brand assets are managed through the theme rather than
 * through WordPress administration.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @return void
 */
function wattlebridge_customize_brand_controls($wp_customize): void
{
  $wp_customize->remove_control('site_icon');
}

add_action(
  'customize_register',
  'wattlebridge_customize_brand_controls',
  20
);
