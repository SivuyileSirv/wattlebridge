<?php
/**
 * Default template fallback.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="main-content">
  <div class="site-container">
    <h1>
      <?php esc_html_e('Wattlebridge Technical Recruitment', 'wattlebridge'); ?>
    </h1>
    <p>
      <?php esc_html_e('Custom WordPress theme initialized successfully.', 'wattlebridge'); ?>
    </p>
  </div>
</main>

<?php
get_footer();