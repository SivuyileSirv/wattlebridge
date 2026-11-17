<?php
/**
 * SCF configuration.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_options_page')) {
    return;
  }

  acf_add_options_page([
    'page_title' => __('Footer Settings', 'wattlebridge'),
    'menu_title' => __('Footer Settings', 'wattlebridge'),
    'menu_slug' => 'wattlebridge-footer-settings',
    'capability' => 'manage_options',
    'redirect' => false,
    'position' => 61,
  ]);
});