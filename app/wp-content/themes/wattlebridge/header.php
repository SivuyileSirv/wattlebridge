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

    <?php
    $contact_page = get_page_by_path('contact');

    $contact_url = $contact_page instanceof WP_Post
      ? get_permalink($contact_page)
      : home_url('/contact/');
    ?>

  <header class="site-header" id="site-header">
    <div class="site-header__shell">
      <div class="site-header__inner container">

        <a class="site-header__brand" href="<?php echo esc_url(home_url('/')); ?>"
          aria-label="<?php esc_attr_e('Wattlebridge Technical Recruitment — Home', 'wattlebridge'); ?>" rel="home">
          <img class="site-header__logo"
            src="<?php echo esc_url(get_theme_file_uri('assets/images/branding/wattlebridge-reversed.svg')); ?>"
            alt="<?php esc_attr_e('Wattlebridge Technical Recruitment', 'wattlebridge'); ?>" width="240" height="80"
            decoding="async">
        </a>

        <button class="site-header__toggle" type="button" aria-controls="primary-navigation" aria-expanded="false"
          aria-label="<?php esc_attr_e('Open navigation', 'wattlebridge'); ?>">
          <span class="site-header__toggle-line"></span>
          <span class="site-header__toggle-line"></span>
          <span class="site-header__toggle-line"></span>
        </button>

        <nav class="site-header__navigation" id="primary-navigation"
          aria-label="<?php esc_attr_e('Primary navigation', 'wattlebridge'); ?>">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'site-header__menu',
              'menu_id' => 'primary-menu',
              'fallback_cb' => false,
              'depth' => 1,
            )
          );
          ?>

          <a class="site-header__cta button button--primary" href="<?php echo esc_url($contact_url); ?>">
            <?php esc_html_e('Get started', 'wattlebridge'); ?>
          </a>
        </nav>

      </div>
    </div>
  </header>