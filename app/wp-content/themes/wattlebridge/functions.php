<?php
/**
 * Wattlebridge theme bootstrap.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

// ============================================================
// 1. Theme modules
// ============================================================

$wattlebridge_modules = array(
  '/inc/theme-setup.php',
  '/inc/enqueue-assets.php',
  '/inc/acf.php',
);

foreach ($wattlebridge_modules as $module) {
  require_once get_theme_file_path($module);
}

// ============================================================
// 2. Homepage editor configuration
// ============================================================

/**
 * Disable the Gutenberg Block Editor for the static homepage.
 *
 * The homepage is built using custom PHP templates and
 * Secure Custom Fields (SCF), so the Classic Editor interface
 * provides a cleaner content management experience.
 *
 * Other pages and posts continue using Gutenberg.
 */
function wattlebridge_homepage_editor($use_block_editor, $post)
{

  if (!($post instanceof WP_Post)) {
    return $use_block_editor;
  }

  if ($post->post_type !== 'page') {
    return $use_block_editor;
  }

  $homepage_id = (int) get_option('page_on_front');

  if ($homepage_id > 0 && (int) $post->ID === $homepage_id) {
    return false;
  }

  return $use_block_editor;
}

add_filter(
  'use_block_editor_for_post',
  'wattlebridge_homepage_editor',
  10,
  2
);
