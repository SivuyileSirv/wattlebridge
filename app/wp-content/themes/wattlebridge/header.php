<!DOCTYPE html>
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
    <div class="container">
      <a class="site-header__brand" href="<?php echo esc_url(home_url('/')); ?>">
        <?php echo esc_html(get_bloginfo('name')); ?>
      </a>

      <?php if (has_nav_menu('primary')): ?>
        <nav class="site-header__nav" aria-label="<?php esc_attr_e('Primary navigation', 'wattlebridge'); ?>">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'site-header__menu',
            )
          );
          ?>
        </nav>
      <?php endif; ?>
    </div>
  </header>
