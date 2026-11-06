<?php
/**
 * Wattlebridge theme bootstrap.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

$wattlebridge_modules = array(
  '/inc/theme-setup.php',
  '/inc/enqueue-assets.php',
);

foreach ($wattlebridge_modules as $module) {
  require_once get_theme_file_path($module);
}
