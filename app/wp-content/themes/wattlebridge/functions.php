<?php
/**
 * Wattlebridge theme bootstrap.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

/**
 * Register theme features.
 *
 * @return void
 */
function wattlebridge_setup(): void
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
  ));

  register_nav_menus(array(
    'primary' => __('Primary Navigation', 'wattlebridge'),
    'footer' => __('Footer Navigation', 'wattlebridge'),
  ));
}
add_action('after_setup_theme', 'wattlebridge_setup');

/**
 * Enqueue theme stylesheet.
 *
 * @return void
 */
function wattlebridge_enqueue_assets(): void
{
  wp_enqueue_style(
    'wattlebridge-style',
    get_stylesheet_uri(),
    array(),
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'wattlebridge_enqueue_assets');
