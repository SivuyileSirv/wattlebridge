<?php
/**
 * Front-end stylesheet registration.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

/**
 * Load the theme stylesheet.
 *
 * @return void
 */
function wattlebridge_enqueue_assets(): void
{
  $theme_version = wp_get_theme()->get('Version');
  $css_path = '/assets/dist/main.css';
  $css_file = get_theme_file_path($css_path);

  if (is_file($css_file) && filesize($css_file) > 0) {
    wp_enqueue_style(
      'wattlebridge-main',
      get_theme_file_uri($css_path),
      array(),
      (string) filemtime($css_file)
    );

    return;
  }

  wp_enqueue_style(
    'wattlebridge-style',
    get_stylesheet_uri(),
    array(),
    $theme_version
  );
}
add_action('wp_enqueue_scripts', 'wattlebridge_enqueue_assets');
