<?php
/**
 * Enqueue theme assets.
 *
 * @package Wattlebridge
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Register frontend assets.
 *
 * @return void
 */
function wattlebridge_enqueue_assets()
{
  $theme_dir = get_template_directory();
  $theme_uri = get_template_directory_uri();

  $compiled_css = '/assets/dist/main.css';
  $fallback_css = '/style.css';

  if (
    file_exists($theme_dir . $compiled_css) &&
    filesize($theme_dir . $compiled_css) > 0
  ) {
    wp_enqueue_style(
      'wattlebridge-main',
      $theme_uri . $compiled_css,
      array(),
      (string) filemtime($theme_dir . $compiled_css)
    );
  } else {
    wp_enqueue_style(
      'wattlebridge-main',
      $theme_uri . $fallback_css,
      array(),
      (string) filemtime($theme_dir . $fallback_css)
    );
  }

  $main_js = '/assets/js/main.js';

  if (file_exists($theme_dir . $main_js)) {
    wp_enqueue_script_module(
      'wattlebridge/main',
      $theme_uri . $main_js,
      array(),
      (string) filemtime($theme_dir . $main_js)
    );
  }
}

add_action('wp_enqueue_scripts', 'wattlebridge_enqueue_assets');