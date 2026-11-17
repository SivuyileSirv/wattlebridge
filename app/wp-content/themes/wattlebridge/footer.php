<?php
/**
 * Site footer.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

// ============================================================
// 1. Footer content from Secure Custom Fields (SCF)
// ============================================================

$footer_description = '';
$footer_phone = '';
$footer_email = '';
$footer_address = '';

$footer_cta_heading = '';
$footer_cta_description = '';
$footer_cta_label = '';
$footer_cta_link = [];

if (function_exists('get_field')) {
  $footer_description = get_field('footer_description', 'option') ?: '';
  $footer_phone = get_field('footer_phone', 'option') ?: '';
  $footer_email = get_field('footer_email', 'option') ?: '';
  $footer_address = get_field('footer_address', 'option') ?: '';

  $footer_cta_heading = get_field('footer_cta_heading', 'option') ?: '';
  $footer_cta_description = get_field('footer_cta_description', 'option') ?: '';
  $footer_cta_label = get_field('footer_cta_label', 'option') ?: '';
  $footer_cta_link = get_field('footer_cta_link', 'option') ?: [];
}

// ============================================================
// 2. Theme assets
// ============================================================

$theme_uri = get_template_directory_uri();

$logo_uri = $theme_uri . '/assets/images/branding/wattlebridge-reversed.svg';
$phone_icon = $theme_uri . '/assets/images/icons/headphone-alt-svgrepo-com.svg';
$email_icon = $theme_uri . '/assets/images/icons/envelope-letter-svgrepo-com.svg';
$location_icon = $theme_uri . '/assets/images/icons/map-alt-svgrepo-com.svg';
$illustration_uri = $theme_uri . '/assets/images/icons/recruitment-illustration.svg';

// ============================================================
// 3. Contact links
// ============================================================

$phone_href = preg_replace('/[^0-9+]/', '', (string) $footer_phone);
$email_href = sanitize_email((string) $footer_email);

// ============================================================
// 4. Footer CTA configuration
// ============================================================

$cta_url = '';
$cta_target = '_self';

if (is_array($footer_cta_link)) {
  $cta_url = $footer_cta_link['url'] ?? '';
  $cta_target = $footer_cta_link['target'] ?? '_self';
}

$cta_target = in_array($cta_target, ['_self', '_blank'], true)
  ? $cta_target
  : '_self';
?>

<footer class="site-footer">
  <div class="container">

    <div class="site-footer__main">

      <!-- Brand -->
      <div class="site-footer__brand">

        <a class="site-footer__logo-link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php
           echo esc_attr(
             sprintf(
               __('%s — Home', 'wattlebridge'),
               get_bloginfo('name')
             )
           );
           ?>">
          <img class="site-footer__logo" src="<?php echo esc_url($logo_uri); ?>"
            alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="300" height="80" loading="lazy">
        </a>

        <?php if ($footer_description): ?>
          <h3 class="site-footer__description">
            <?php echo esc_html($footer_description); ?>
          </h3>
        <?php endif; ?>

        <!-- Operating hours -->
        <div class="site-footer__hours">

          <h6 class="site-footer__hours-heading">
            <?php esc_html_e('Operating time', 'wattlebridge'); ?>
          </h6>

          <p class="site-footer__hours-text">
            <?php
            esc_html_e(
              'Monday to Friday, 8:30 am to 5:00 pm AWST (Perth time). Closed weekends and public holidays.',
              'wattlebridge'
            );
            ?>
          </p>

        </div>

      </div>

      <!-- Quick links -->
      <nav class="site-footer__links" aria-label="<?php esc_attr_e('Footer navigation', 'wattlebridge'); ?>">

        <h6 class="site-footer__heading">
          <?php esc_html_e('Quick links', 'wattlebridge'); ?>
        </h6>

        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'site-footer__menu',
          'fallback_cb' => false,
          'depth' => 1,
        ]);
        ?>

      </nav>

      <!-- Contact -->
      <div class="site-footer__contact">

        <h6 class="site-footer__heading">
          <?php esc_html_e('Get in touch', 'wattlebridge'); ?>
        </h6>

        <ul class="site-footer__contact-list">

          <?php if ($footer_phone && $phone_href): ?>
            <li class="site-footer__contact-item">

              <img class="site-footer__contact-icon" src="<?php echo esc_url($phone_icon); ?>" alt="" aria-hidden="true"
                width="20" height="20">

              <a href="<?php echo esc_url('tel:' . $phone_href); ?>">
                <?php echo esc_html($footer_phone); ?>
              </a>

            </li>
          <?php endif; ?>

          <?php if ($footer_email && $email_href): ?>
            <li class="site-footer__contact-item">

              <img class="site-footer__contact-icon" src="<?php echo esc_url($email_icon); ?>" alt="" aria-hidden="true"
                width="20" height="20">

              <a href="<?php echo esc_url('mailto:' . $email_href); ?>">
                <?php echo esc_html($footer_email); ?>
              </a>

            </li>
          <?php endif; ?>

          <?php if ($footer_address): ?>
            <li class="site-footer__contact-item">

              <img class="site-footer__contact-icon" src="<?php echo esc_url($location_icon); ?>" alt=""
                aria-hidden="true" width="20" height="20">

              <address class="site-footer__address">
                <?php echo nl2br(esc_html($footer_address)); ?>
              </address>

            </li>
          <?php endif; ?>

        </ul>

      </div>

      <!-- Hiring CTA -->
      <div class="site-footer__cta">

        <?php if ($footer_cta_heading): ?>
          <h6 class="site-footer__heading">
            <?php echo esc_html($footer_cta_heading); ?>
          </h6>
        <?php endif; ?>

        <?php if ($footer_cta_description): ?>
          <p class="site-footer__cta-description">
            <?php echo esc_html($footer_cta_description); ?>
          </p>
        <?php endif; ?>

        <?php if ($footer_cta_label && $cta_url): ?>
          <a class="site-footer__cta-button button button--primary" href="<?php echo esc_url($cta_url); ?>"
            target="<?php echo esc_attr($cta_target); ?>" <?php if ('_blank' === $cta_target): ?> rel="noopener noreferrer"
            <?php endif; ?>>
            <span><?php echo esc_html($footer_cta_label); ?></span>

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
              <path d="M4 12H20M13 5L20 12L13 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>

          </a>
        <?php endif; ?>

      </div>

      <!-- Decorative illustration -->
      <img class="site-footer__illustration" src="<?php echo esc_url($illustration_uri); ?>" alt="" aria-hidden="true"
        loading="lazy">

    </div>

    <!-- Bottom bar -->
    <div class="site-footer__bottom">

      <p class="site-footer__copyright">
        &copy; <?php echo esc_html(wp_date('Y')); ?> —
        <?php esc_html_e('All rights reserved.', 'wattlebridge'); ?>
        <?php echo esc_html(get_bloginfo('name')); ?>
      </p>

      <?php
      $privacy_page_id = get_option('wp_page_for_privacy_policy');

      if (
        $privacy_page_id &&
        'publish' === get_post_status($privacy_page_id)
      ):
        ?>
        <a class="site-footer__privacy" href="<?php echo esc_url(get_permalink($privacy_page_id)); ?>">
          <?php esc_html_e('Privacy Policy', 'wattlebridge'); ?>
        </a>
      <?php endif; ?>

    </div>

  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>