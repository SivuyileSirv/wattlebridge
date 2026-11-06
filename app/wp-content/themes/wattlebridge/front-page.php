<?php
/**
 * Front page template.
 *
 * @package Wattlebridge
 */

get_header();
?>

<main id="main-content" class="site-main">
  <div class="container">
    <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>

    <p>
      <?php esc_html_e('Wattlebridge homepage is rendering successfully.', 'wattlebridge'); ?>
    </p>
  </div>
</main>

<?php
get_footer();
