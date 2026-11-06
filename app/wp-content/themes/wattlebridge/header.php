<?php
/**
 * Site header.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <a class="skip-link" href="#main-content">
    <?php esc_html_e('Skip to content', 'wattlebridge'); ?>
  </a>

  <header class="site-header">
    <div class="site-container">
      <p class="site-header__brand">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <?php echo esc_html(get_bloginfo('name')); ?>
        </a>
      </p>
    </div>
  </header>
