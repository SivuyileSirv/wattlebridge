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
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

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

  register_nav_menus(
    array(
      'primary' => __('Primary Navigation', 'wattlebridge'),
      'footer' => __('Footer Navigation', 'wattlebridge'),
    )
  );
}
add_action('after_setup_theme', 'wattlebridge_setup');
